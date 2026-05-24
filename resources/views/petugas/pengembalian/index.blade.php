@extends('layouts.apppetugas')

@section('content')

<div class="container-fluid">


@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif


<div class="bg-danger text-white p-4 rounded shadow mb-4">

<h4>

🔴 Verifikasi Pengembalian

</h4>

<small>

Peminjaman yang sudah disetujui dan siap dikembalikan

</small>

</div>



<div class="card shadow border-0">

<div class="card-body">

<div class="table-responsive">

<table class="table table-hover">

<thead class="thead-dark">

<tr>

<th>No</th>

<th>Peminjam</th>

<th>Alat</th>

<th>Tgl Pinjam</th>

<th>Batas Kembali</th>

<th>Status</th>

<th>Aksi</th>

</tr>

</thead>



<tbody>

@forelse($data as $item)

<tr>

<td>

{{ $loop->iteration }}

</td>


<td>

{{ $item->user->nama }}

</td>


<td>

{{ $item->alat->nama_alat }}

</td>


<td>

{{ $item->tanggal_pinjam }}

</td>


<td>

{{ $item->tanggal_kembali }}

</td>


<td>

@if($item->status=='approved')

<span class="badge badge-primary">

SEDANG DIPINJAM

</span>


@elseif($item->status=='menunggu_verifikasi')

<span class="badge badge-warning">

MENUNGGU VERIFIKASI

</span>


@elseif($item->status=='selesai')

<span class="badge badge-success">

SELESAI

</span>

@endif

</td>


<td>

@if($item->status=='approved')

<button
class="btn btn-secondary btn-sm"
disabled>

Menunggu Pengembalian

</button>


@elseif($item->status=='menunggu_verifikasi')

<form
action="{{ route('petugas.pengembalian.verifikasi',$item->id) }}"
method="POST">

@csrf

<button
class="btn btn-success btn-sm"
onclick="return confirm('Verifikasi pengembalian?')">

✔ Verifikasi

</button>

</form>


@else

<button
class="btn btn-success btn-sm"
disabled>

✔ Selesai

</button>

@endif

</td>

</tr>


@empty

<tr>

<td
colspan="7"
class="text-center">

Belum ada data

</td>

</tr>

@endforelse


</tbody>

</table>

</div>

</div>

</div>

</div>

@endsection
@extends('layouts.apppetugas')

@section('content')

<div class="container-fluid">

<div class="bg-warning text-dark p-4 rounded shadow mb-4">

<h4 class="mb-1">

🟡 Approval Peminjaman

</h4>

<small>

Data peminjaman yang menunggu persetujuan

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

<th>Jumlah</th>

<th>Tanggal</th>

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

{{ $item->jumlah }}

</td>


<td>

{{ $item->tanggal_pinjam }}

</td>


<td>

@if($item->status=='pending')

<span class="badge badge-warning">

PENDING

</span>

@elseif($item->status=='approved')

<span class="badge badge-success">

APPROVED

</span>

@elseif($item->status=='rejected')

<span class="badge badge-danger">

REJECTED

</span>

@else

<span class="badge badge-secondary">

{{ strtoupper($item->status) }}

</span>

@endif

</td>


<td>

@if($item->status=='pending')

<div class="d-flex">

<form
action="{{ route('petugas.peminjaman.approve',$item->id) }}"
method="POST"
class="mr-2">

@csrf

<button
class="btn btn-success btn-sm">

✔ Approve

</button>

</form>



<form
action="{{ route('petugas.peminjaman.reject',$item->id) }}"
method="POST">

@csrf

<button
class="btn btn-danger btn-sm">

✖ Reject

</button>

</form>

</div>


@elseif($item->status=='approved')

<button
class="btn btn-success btn-sm"
disabled>

✔ Sudah Approve

</button>


@elseif($item->status=='rejected')

<button
class="btn btn-danger btn-sm"
disabled>

✖ Ditolak

</button>


@else

—

@endif

</td>

</tr>


@empty

<tr>

<td
colspan="7"
class="text-center">

Tidak ada data

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
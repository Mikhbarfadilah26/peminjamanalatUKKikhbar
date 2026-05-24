@extends('layouts.apppeminjam')

@section('content')

<style>

.hero{
background:
linear-gradient(
135deg,
#2563eb,
#0ea5e9
);

border-radius:24px;

padding:40px;

color:white;

box-shadow:
0 15px 35px
rgba(37,99,235,.18);
}

.card-modern{

border:none;

border-radius:22px;

transition:.3s;

overflow:hidden;

box-shadow:
0 10px 25px
rgba(0,0,0,.08);

}

.card-modern:hover{

transform:
translateY(-6px);

}

.icon-box{

width:70px;

height:70px;

border-radius:20px;

display:flex;

align-items:center;

justify-content:center;

font-size:30px;

margin:auto;

}

.table td{

vertical-align:center;

}

</style>



<div class="container-fluid">


{{-- HEADER --}}
<div class="hero mb-4">

<div class="row align-items-center">

<div class="col-md-8">

<h2 class="fw-bold">

👋 Halo,
{{ auth()->user()->nama }}

</h2>

<p class="mb-0">

Kelola peminjaman alat dengan cepat

</p>

</div>

<div class="col-md-4 text-end">

<h5>

{{ now()->format('d F Y') }}

</h5>

<small>

UKK RPL 2025/2026

</small>

</div>

</div>

</div>




{{-- STATISTIK --}}
<div class="row g-4">


<div class="col-md-4">

<div class="card card-modern">

<div class="card-body text-center">

<div
class="icon-box bg-primary text-white">

📦

</div>

<h5 class="mt-3">

Total Pinjaman

</h5>

<h1 class="text-primary">

{{ $totalPinjaman }}

</h1>

</div>

</div>

</div>



<div class="col-md-4">

<div class="card card-modern">

<div class="card-body text-center">

<div
class="icon-box bg-warning">

⏳

</div>

<h5 class="mt-3">

Sedang Dipinjam

</h5>

<h1 class="text-warning">

{{ $dipinjam }}

</h1>

</div>

</div>

</div>



<div class="col-md-4">

<div class="card card-modern">

<div class="card-body text-center">

<div
class="icon-box bg-success text-white">

✅

</div>

<h5 class="mt-3">

Selesai

</h5>

<h1 class="text-success">

{{ $selesai }}

</h1>

</div>

</div>

</div>

</div>





{{-- QUICK MENU --}}
<div class="row mt-4">


<div class="col-md-6">

<div class="card card-modern">

<div class="card-body">

<h4>

📚 Pinjam Alat

</h4>

<p class="text-muted">

Lihat alat dan ajukan peminjaman.

</p>

<a
href="/peminjam/alat"
class="btn btn-primary">

Lihat Alat

</a>

</div>

</div>

</div>



<div class="col-md-6">

<div class="card card-modern">

<div class="card-body">

<h4>

📄 Status Peminjaman

</h4>

<p class="text-muted">

Pantau approval dan pengembalian.

</p>

<a
href="/peminjam/status"
class="btn btn-success">

Lihat Status

</a>

</div>

</div>

</div>


</div>





{{-- RIWAYAT --}}
<div class="card card-modern mt-4">

<div class="card-header bg-white">

<h5 class="mb-0">

Riwayat Terbaru

</h5>

</div>


<div class="card-body p-0">

<table class="table mb-0">

<thead>

<tr>

<th>Alat</th>

<th>Status</th>

<th>Tanggal</th>

</tr>

</thead>


<tbody>

@forelse($terbaru as $item)

<tr>

<td>

{{ $item->alat->nama_alat ?? '-' }}

</td>


<td>

@if($item->status=='pending')

<span class="badge bg-warning">

Pending

</span>

@elseif($item->status=='approved')

<span class="badge bg-primary">

Approved

</span>

@elseif($item->status=='selesai')

<span class="badge bg-success">

Selesai

</span>

@else

<span class="badge bg-secondary">

{{ $item->status }}

</span>

@endif

</td>


<td>

{{ $item->created_at->format('d M Y') }}

</td>

</tr>


@empty

<tr>

<td
colspan="3"
class="text-center">

Belum ada riwayat

</td>

</tr>

@endforelse


</tbody>

</table>

</div>

</div>

</div>

@endsection
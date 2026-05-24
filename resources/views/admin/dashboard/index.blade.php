@extends('layouts.appadmin')

@section('content')

<style>

.dashboard-header{
background:linear-gradient(135deg,#2563eb,#1e40af);
border-radius:12px;
padding:30px;
color:white;
position:relative;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,.15);
}

.dashboard-header::before{
content:'';
position:absolute;
width:250px;
height:250px;
background:rgba(255,255,255,.08);
border-radius:50%;
top:-80px;
right:-80px;
}

.dashboard-header::after{
content:'';
position:absolute;
width:180px;
height:180px;
background:rgba(255,255,255,.05);
border-radius:50%;
bottom:-60px;
left:-60px;
}

.info-card{
border:none;
border-radius:12px;
overflow:hidden;
transition:.3s;
box-shadow:0 6px 18px rgba(0,0,0,.08);
}

.info-card:hover{
transform:translateY(-5px);
}

.info-icon{
font-size:45px;
opacity:.15;
position:absolute;
right:20px;
top:20px;
}

.card-modern{
border:none;
border-radius:12px;
overflow:hidden;
box-shadow:0 6px 18px rgba(0,0,0,.08);
}

.bg-gradient-primary{
background:linear-gradient(135deg,#3b82f6,#1d4ed8);
color:white;
}

.bg-gradient-success{
background:linear-gradient(135deg,#22c55e,#15803d);
color:white;
}

.bg-gradient-warning{
background:linear-gradient(135deg,#facc15,#ca8a04);
color:white;
}

.bg-gradient-danger{
background:linear-gradient(135deg,#ef4444,#b91c1c);
color:white;
}

</style>

<div class="container-fluid">

<div class="dashboard-header mb-4">

<div class="row align-items-center">

<div class="col-md-8">

<h2>

<i class="fas fa-tools mr-2"></i>

Dashboard Peminjaman Alat

</h2>

<p>

Selamat datang,
<b>{{ auth()->user()->nama }}</b>

</p>

</div>

<div class="col-md-4 text-right">

<h5>

{{ now()->format('d F Y') }}

</h5>

<small>

Sistem UKK RPL 2025/2026

</small>

</div>

</div>

</div>


<div class="row">

<div class="col-md-3">

<div class="card info-card bg-gradient-primary">

<div class="card-body position-relative">

<h6>User</h6>

<h2>{{ $user ?? 0 }}</h2>

<i class="fas fa-users info-icon"></i>

</div>

</div>

</div>


<div class="col-md-3">

<div class="card info-card bg-gradient-success">

<div class="card-body position-relative">

<h6>Alat</h6>

<h2>{{ $alat ?? 0 }}</h2>

<i class="fas fa-tools info-icon"></i>

</div>

</div>

</div>


<div class="col-md-3">

<div class="card info-card bg-gradient-warning">

<div class="card-body position-relative">

<h6>Peminjaman</h6>

<h2>{{ $peminjaman ?? 0 }}</h2>

<i class="fas fa-handshake info-icon"></i>

</div>

</div>

</div>


<div class="col-md-3">

<div class="card info-card bg-gradient-danger">

<div class="card-body position-relative">

<h6>Pengembalian</h6>

<h2>{{ $pengembalian ?? 0 }}</h2>

<i class="fas fa-undo info-icon"></i>

</div>

</div>

</div>

</div>



<div class="row mt-4">

{{-- PEMINJAMAN --}}
<div class="col-md-4">

<div class="card card-modern">

<div class="card-header bg-primary text-white">

<b>Peminjaman Terbaru</b>

</div>

<div class="card-body p-0">

<table class="table table-hover mb-0">

<thead>

<tr>

<th>User</th>

<th>Alat</th>

<th>Status</th>

</tr>

</thead>

<tbody>

@forelse($peminjamanTerbaru as $item)

<tr>

<td>

{{ $item->user->nama ?? '-' }}

</td>

<td>

{{ $item->alat->nama_alat ?? '-' }}

</td>

<td>

<span class="badge badge-warning">

{{ strtoupper($item->status) }}

</span>

</td>

</tr>

@empty

<tr>

<td colspan="3">

Kosong

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>



{{-- PENGEMBALIAN --}}
<div class="col-md-4">

<div class="card card-modern">

<div class="card-header bg-danger text-white">

<b>Pengembalian Terbaru</b>

</div>

<div class="card-body p-0">

<table class="table table-hover mb-0">

<thead>

<tr>

<th>User</th>

<th>Alat</th>

</tr>

</thead>

<tbody>

@forelse($pengembalianTerbaru as $item)

<tr>

<td>

{{ $item->user->nama ?? '-' }}

</td>

<td>

{{ $item->alat->nama_alat ?? '-' }}

</td>

</tr>

@empty

<tr>

<td colspan="2">

Kosong

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>



{{-- ALAT --}}
<div class="col-md-4">

<div class="card card-modern">

<div class="card-header bg-success text-white">

<b>Alat Terbaru</b>

</div>

<div class="card-body p-0">

<table class="table table-hover mb-0">

<thead>

<tr>

<th>Nama</th>

<th>Stok</th>

</tr>

</thead>

<tbody>

@forelse($alatTerbaru as $item)

<tr>

<td>

{{ $item->nama_alat }}

</td>

<td>

{{ $item->stok }}

</td>

</tr>

@empty

<tr>

<td colspan="2">

Kosong

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</div>

</div>

@endsection
@extends('layouts.appadmin')

@section('content')

<style>

.page-header{
background:linear-gradient(135deg,#2563eb,#1e3a8a);
border-radius:18px;
padding:28px;
color:white;
margin-bottom:25px;
box-shadow:0 12px 25px rgba(37,99,235,.18);
}

.card-modern{
border:none;
border-radius:18px;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,.08);
}

.filter-box{
background:#f8fafc;
border-radius:14px;
padding:20px;
}

.form-control{
border-radius:12px;
height:46px;
}

.btn-modern{
border-radius:12px;
padding:10px 18px;
font-weight:600;
}

.table-modern{
margin-bottom:0;
}

.table-modern thead{
background:#0f172a;
color:white;
}

.table-modern th{
border:none;
}

.table-modern td{
vertical-align:middle;
}

.table-modern tbody tr{
transition:.25s;
}

.table-modern tbody tr:hover{
background:#f8fafc;
}

.badge-status{
padding:8px 12px;
border-radius:30px;
font-size:12px;
}

.section-title{
font-weight:700;
color:#1e293b;
margin-bottom:15px;
}

.empty-state{
padding:30px;
text-align:center;
color:#64748b;
}

</style>


<div class="container-fluid">

{{-- HEADER --}}
<div class="page-header">

<div class="d-flex justify-content-between align-items-center">

<div>

<h2>

<i class="fas fa-chart-line mr-2"></i>

Laporan Peminjaman & Pengembalian

</h2>

<p class="mb-0">

Monitoring transaksi alat UKK

</p>

</div>

<div>

<h5>

{{ now()->format('d F Y') }}

</h5>

</div>

</div>

</div>



<div class="card card-modern">

<div class="card-body">


{{-- FILTER --}}
<div class="filter-box mb-4">

<form method="GET">

<div class="row">

<div class="col-md-4">

<label>Dari Tanggal</label>

<input
type="date"
name="mulai"
value="{{ request('mulai') }}"
class="form-control">

</div>


<div class="col-md-4">

<label>Sampai Tanggal</label>

<input
type="date"
name="sampai"
value="{{ request('sampai') }}"
class="form-control">

</div>


<div class="col-md-4 d-flex align-items-end">

<button class="btn btn-primary btn-modern mr-2">

<i class="fas fa-search mr-1"></i>

Filter

</button>


<a
href="/admin/laporan"
class="btn btn-secondary btn-modern mr-2">

Reset

</a>


<a
href="/admin/laporan/cetak?mulai={{ $mulai }}&sampai={{ $sampai }}"
target="_blank"
class="btn btn-success btn-modern">

<i class="fas fa-print mr-1"></i>

Cetak

</a>

</div>

</div>

</form>

</div>



{{-- PEMINJAMAN --}}
<div class="mb-5">

<h4 class="section-title">

<i class="fas fa-handshake text-warning mr-2"></i>

Data Peminjaman

</h4>


<div class="table-responsive">

<table class="table table-modern">

<thead>

<tr>

<th>User</th>

<th>Alat</th>

<th>Tanggal</th>

<th>Status</th>

</tr>

</thead>


<tbody>

@forelse($peminjaman as $p)

<tr>

<td>

{{ $p->user->nama ?? '-' }}

</td>


<td>

{{ $p->alat->nama_alat ?? '-' }}

</td>


<td>

{{ $p->created_at->format('d M Y H:i') }}

</td>


<td>

<span class="badge badge-status
{{ $p->status=='approved'
? 'badge-success'
: ($p->status=='pending'
? 'badge-warning'
: 'badge-danger') }}">

{{ strtoupper($p->status) }}

</span>

</td>

</tr>

@empty

<tr>

<td colspan="4">

<div class="empty-state">

Belum ada data peminjaman

</div>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>




{{-- PENGEMBALIAN --}}
<div>

<h4 class="section-title">

<i class="fas fa-undo text-danger mr-2"></i>

Data Pengembalian

</h4>


<div class="table-responsive">

<table class="table table-modern">

<thead>

<tr>

<th>User</th>

<th>Alat</th>

<th>Tanggal Kembali</th>

<th>Denda</th>

</tr>

</thead>


<tbody>

@forelse($pengembalian as $k)

<tr>

<td>

{{ $k->peminjaman->user->nama ?? '-' }}

</td>


<td>

{{ $k->peminjaman->alat->nama_alat ?? '-' }}

</td>


<td>

{{ \Carbon\Carbon::parse($k->tanggal_pengembalian)->format('d M Y') }}

</td>


<td>

@if($k->denda>0)

<span class="badge badge-danger">

Rp {{ number_format($k->denda) }}

</span>

@else

<span class="badge badge-success">

Tidak Ada

</span>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="4">

<div class="empty-state">

Belum ada data pengembalian

</div>

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
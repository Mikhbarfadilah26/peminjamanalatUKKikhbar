@extends('layouts.appadmin')

@section('content')

<style>

.page-header{
background:linear-gradient(135deg,#1e3a8a,#2563eb);
border-radius:20px;
padding:28px;
color:white;
margin-bottom:24px;
box-shadow:0 15px 30px rgba(37,99,235,.18);
}

.card-modern{
border:none;
border-radius:20px;
overflow:hidden;
box-shadow:0 12px 25px rgba(0,0,0,.08);
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
padding:18px;
font-size:14px;
font-weight:700;
white-space:nowrap;
}

.table-modern td{
padding:18px;
vertical-align:middle;
border-color:#eef2f7;
}

.table-modern tbody tr{
transition:.25s;
}

.table-modern tbody tr:hover{
background:#f8fafc;
transform:scale(1.002);
}

.number-box{
width:42px;
height:42px;
border-radius:12px;
display:flex;
align-items:center;
justify-content:center;
background:#e0f2fe;
font-weight:700;
color:#0369a1;
}

.user-box{
display:flex;
align-items:center;
gap:12px;
}

.user-avatar{
width:42px;
height:42px;
border-radius:50%;
background:linear-gradient(135deg,#2563eb,#60a5fa);
color:white;
display:flex;
align-items:center;
justify-content:center;
font-weight:700;
}

.alat-box{
background:#f1f5f9;
padding:8px 14px;
border-radius:12px;
display:inline-block;
font-weight:600;
}

.qty-box{
background:#dcfce7;
padding:8px 14px;
border-radius:10px;
display:inline-block;
font-weight:700;
color:#166534;
}

.badge-modern{
padding:9px 14px;
border-radius:30px;
font-size:12px;
font-weight:700;
}

.date-box{
font-size:13px;
color:#64748b;
font-weight:600;
}

.empty-box{
padding:60px;
text-align:center;
color:#64748b;
}

.empty-box i{
font-size:55px;
margin-bottom:15px;
opacity:.3;
}

</style>


<div class="container-fluid">

{{-- HEADER --}}
<div class="page-header">

<div class="d-flex justify-content-between align-items-center">

<div>

<h2 class="mb-2">

<i class="fas fa-handshake mr-2"></i>

Data Peminjaman

</h2>

<p class="mb-0">

Monitoring seluruh aktivitas peminjaman alat

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

<div class="card-body p-0">

<div class="table-responsive">

<table class="table table-modern">

<thead>

<tr>

<th>No</th>

<th>Peminjam</th>

<th>Alat</th>

<th>Jumlah</th>

<th>Status</th>

<th>Tanggal</th>

</tr>

</thead>


<tbody>

@forelse($data as $item)

<tr>

<td>

<div class="number-box">

{{ $loop->iteration }}

</div>

</td>


<td>

<div class="user-box">

<div class="user-avatar">

{{ strtoupper(substr($item->user->nama ?? 'U',0,1)) }}

</div>

<div>

<b>

{{ $item->user->nama ?? '-' }}

</b>

</div>

</div>

</td>


<td>

<div class="alat-box">

{{ $item->alat->nama_alat ?? '-' }}

</div>

</td>


<td>

<div class="qty-box">

{{ $item->jumlah }}

</div>

</td>


<td>

@php

$badge = match($item->status){

'pending'
=> 'warning',

'dipinjam'
=> 'primary',

'menunggu_verifikasi'
=> 'info',

'selesai'
=> 'success',

default
=> 'secondary'

};

@endphp


<span
class="badge badge-{{ $badge }} badge-modern">

{{ strtoupper($item->status) }}

</span>

</td>


<td>

<div class="date-box">

<i class="far fa-calendar-alt mr-1"></i>

{{ $item->created_at->format('d M Y') }}

<br>

<small>

{{ $item->created_at->format('H:i') }}

</small>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="6">

<div class="empty-box">

<i class="fas fa-folder-open"></i>

<h5>

Belum Ada Data

</h5>

<p>

Data peminjaman akan tampil di sini

</p>

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

@endsection
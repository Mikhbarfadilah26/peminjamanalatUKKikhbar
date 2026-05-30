@extends('layouts.appadmin')

@section('content')

<style>

.page-header{
    background:linear-gradient(135deg,#dc2626,#b91c1c);
    border-radius:20px;
    padding:28px;
    color:white;
    margin-bottom:24px;
    box-shadow:0 15px 30px rgba(220,38,38,.18);
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
}

.number-box{
    width:42px;
    height:42px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#fee2e2;
    color:#dc2626;
    font-weight:700;
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
    background:linear-gradient(135deg,#dc2626,#fb7185);
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

.alat-box{
    background:#f8fafc;
    padding:8px 14px;
    border-radius:12px;
    display:inline-block;
    font-weight:600;
}

.status-box{
    padding:10px 16px;
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
    font-size:60px;
    opacity:.3;
    margin-bottom:15px;
}

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="page-header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h2 class="mb-2">

                    <i class="fas fa-clipboard-check mr-2"></i>

                    Monitoring Pengembalian

                </h2>

                <p class="mb-0">

                    Kelola dan verifikasi pengembalian alat

                </p>

            </div>

            <div>

                <h5>

                    {{ now()->format('d F Y') }}

                </h5>

            </div>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card card-modern">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-modern">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Alat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Batas Kembali</th>
                            <th>Status</th>
                            <th>Tanggal Pengembalian</th>
                            <th width="180">Aksi</th>

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

                                    <i class="fas fa-tools mr-2 text-danger"></i>

                                    {{ $item->alat->nama_alat ?? '-' }}

                                </div>

                            </td>

                            <td>

                                <div class="date-box">

                                    <i class="fas fa-calendar-plus mr-1"></i>

                                    {{ $item->tanggal_pinjam }}

                                </div>

                            </td>

                            <td>

                                <div class="date-box">

                                    <i class="fas fa-clock mr-1"></i>

                                    {{ $item->tanggal_kembali }}

                                </div>

                            </td>

                            <td>

                                @if($item->status=='approved')

                                    <span class="badge badge-primary status-box">

                                        SEDANG DIPINJAM

                                    </span>

                                @elseif($item->status=='menunggu_verifikasi')

                                    <span class="badge badge-warning status-box">

                                        MENUNGGU VERIFIKASI

                                    </span>

                                @elseif($item->status=='selesai')

                                    <span class="badge badge-success status-box">

                                        SELESAI

                                    </span>

                                @else

                                    <span class="badge badge-secondary status-box">

                                        {{ strtoupper($item->status) }}

                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="date-box">

                                    <i class="far fa-calendar-check mr-1"></i>

                                    {{ $item->created_at->format('d M Y') }}

                                    <br>

                                    <small>

                                        {{ $item->created_at->format('H:i') }}

                                    </small>

                                </div>

                            </td>

                            <td>

                                @if($item->status=='approved')

                                    <button
                                        class="btn btn-secondary btn-sm"
                                        disabled>

                                        Menunggu

                                    </button>

                                @elseif($item->status=='menunggu_verifikasi')

                                    <form
                                        action="{{ route('admin.pengembalian.verifikasi',$item->id) }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            type="submit"
                                            class="btn btn-success btn-sm"
                                            onclick="return confirm('Verifikasi pengembalian alat ini?')">

                                            <i class="fas fa-check"></i>

                                            Verifikasi

                                        </button>

                                    </form>

                                @elseif($item->status=='selesai')

                                    <button
                                        class="btn btn-success btn-sm"
                                        disabled>

                                        <i class="fas fa-check-circle"></i>

                                        Selesai

                                    </button>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8">

                                <div class="empty-box">

                                    <i class="fas fa-box-open"></i>

                                    <h5>

                                        Belum Ada Data Pengembalian

                                    </h5>

                                    <p>

                                        Data pengembalian akan muncul di sini

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
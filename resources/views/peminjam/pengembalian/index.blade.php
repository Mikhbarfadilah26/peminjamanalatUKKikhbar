@extends('layouts.apppeminjam')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body {
        background: #f8f9fa;
        font-family: 'Nunito', sans-serif;
    }

    /* Header Styling */
    .header-gradient {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(78, 115, 223, 0.15);
    }

    /* Stat Cards Styling */
    .stat-card-modern {
        border: none;
        border-radius: 16px;
        background: #ffffff;
        transition: all 0.3s ease;
        border-left: 5px solid #ccc;
    }

    .stat-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05) !important;
    }

    .stat-card-primary {
        border-left-color: #4e73df;
    }

    .stat-card-warning {
        border-left-color: #f6c23e;
    }

    .stat-card-success {
        border-left-color: #1cc88a;
    }

    .stat-card-danger {
        border-left-color: #e74a3b;
    }

    .icon-shape {
        width: 48px;
        height: 48px;
        background: #f1f3f9;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    /* Main Table Card Styling */
    .table-card-modern {
        border: none;
        border-radius: 16px;
        background: #ffffff;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
    }

    .table-card-modern .card-header {
        border-bottom: 1px solid #f1f3f9;
        padding: 20px 24px;
    }

    /* Premium Table Styling */
    .table-modern thead th {
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: 0.8px;
        font-weight: 700;
        color: #a0aec0;
        padding: 16px;
        border-bottom: 2px solid #f1f3f9;
    }

    .table-modern tbody td {
        padding: 18px 16px;
        color: #4a5568;
        font-size: 14px;
        border-bottom: 1px solid #f1f3f9;
    }

    .table-modern tbody tr:hover {
        background-color: #f8fafc;
    }

    /* Custom Badges (Subtle & Elegant Theme) */
    .badge-modern {
        padding: 6px 14px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 12px;
        display: inline-block;
    }

    .badge-subtle-warning {
        background-color: #fff9db;
        color: #f59f00;
    }

    .badge-subtle-primary {
        background-color: #e7f5ff;
        color: #1c7ed6;
    }

    .badge-subtle-danger {
        background-color: #fff5f5;
        color: #fa5252;
    }

    .badge-subtle-info {
        background-color: #e6fffa;
        color: #0b69a3;
    }

    .badge-subtle-success {
        background-color: #ebfbee;
        color: #2b8a3e;
    }

    /* Button Custom Actions */
    .btn-modern {
        border-radius: 10px;
        padding: 6px 16px;
        font-size: 13px;
        font-weight: 600;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.2s;
    }

    .btn-modern:hover:not(:disabled) {
        transform: scale(1.03);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container-fluid px-4 py-3">

    {{-- HEADER WITH GRADIENT --}}
    <div class="card header-gradient text-white mb-4 shadow-sm">
        <div class="card-body p-4 d-flex align-items-center justify-content-between">
            <div>
                <h3 class="mb-1 font-weight-bold d-flex align-items-center">
                    <i class="fa-solid shadow-sm fa-boxes-jwt bg-white text-primary p-2 rounded-circle mr-3" style="font-size: 20px; width: 42px; height: 42px; display: inline-flex; justify-content: center; align-items: center;">🔄</i>
                    Pengembalian Alat
                </h3>
                <p class="mb-0 text-white-50 small">Kelola dan pantau seluruh riwayat pengembalian armada alat Anda secara real-time.</p>
            </div>
        </div>
    </div>

    {{-- STATISTIK (MODERN STYLE) --}}
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card-modern stat-card-primary shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">Total Peminjaman</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $peminjaman }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape text-primary"><i class="fa-solid fa-layer-group"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card-modern stat-card-warning shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">Menunggu Persetujuan</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $pending }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape text-warning"><i class="fa-solid fa-hourglass-half"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card-modern stat-card-success shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">Sedang Dipinjam</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $approved }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape text-success"><i class="fa-solid fa-hand-holding-hand"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card-modern stat-card-danger shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-muted text-uppercase mb-1">Proses Verifikasi</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $pengembalian }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape text-danger"><i class="fa-solid fa-file-shield"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MAIN TABLE CARD --}}
    <div class="card table-card-modern mt-2">
        <div class="card-header bg-white d-flex align-items-center justify-content-between">
            <h5 class="mb-0 text-gray-800 font-weight-bold">
                <i class="fa-solid fa-list-check text-muted mr-2"></i> Data Log Pengembalian
            </h5>
        </div>

        <div class="card-body p-0">
            {{-- ALERT ALERTS SYSTEM --}}
            @if(session('success'))
            <div class="alert alert-success mx-4 mt-3 border-0 shadow-sm d-flex align-items-center" role="alert">
                <i class="fa-solid fa-circle-check mr-2" style="font-size: 18px;"></i>
                <div>{{ session('success') }}</div>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger mx-4 mt-3 border-0 shadow-sm d-flex align-items-center" role="alert">
                <i class="fa-solid fa-circle-exclamation mr-2" style="font-size: 18px;"></i>
                <div>{{ session('error') }}</div>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-modern align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" width="70">No</th>
                            <th>Nama Alat</th>
                            <th class="text-center">Jumlah</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td class="text-center font-weight-bold text-muted">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-light rounded p-2 text-center text-primary mr-3" style="width: 38px; height: 38px; display: inline-flex; justify-content: center; align-items: center; border-radius: 8px !important;">
                                        <i class="fa-solid fa-screwdriver-wrench"></i>
                                    </div>
                                    <span class="font-weight-bold text-gray-800">{{ $item->alat->nama_alat }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark px-3 py-2 font-weight-bold" style="border-radius: 8px;">{{ $item->jumlah }} Unit</span>
                            </td>
                            <td>
                                <i class="fa-regular fa-calendar-minus text-muted mr-1"></i> {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}
                            </td>
                            <td>
                                <i class="fa-regular fa-calendar-check text-muted mr-1"></i> {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}
                            </td>
                            <td>
                                @if($item->status == 'pending')
                                <span class="badge-modern badge-subtle-warning">
                                    <i class="fa-solid fa-circle-dot mr-1" style="font-size: 9px;"></i> Pending
                                </span>
                                @elseif($item->status == 'approved')
                                <span class="badge-modern badge-subtle-primary">
                                    <i class="fa-solid fa-circle-dot mr-1" style="font-size: 9px;"></i> Dipinjam
                                </span>
                                @elseif($item->status == 'terlambat')
                                <span class="badge-modern badge-subtle-danger">
                                    <i class="fa-solid fa-circle-dot mr-1" style="font-size: 9px;"></i> Terlambat
                                </span>
                                @elseif($item->status == 'menunggu_verifikasi')
                                <span class="badge-modern badge-subtle-info">
                                    <i class="fa-solid fa-circle-dot mr-1" style="font-size: 9px;"></i> Menunggu Verifikasi
                                </span>
                                @elseif($item->status == 'selesai' || $item->status == 'dikembalikan')
                                <span class="badge-modern badge-subtle-success">
                                    <i class="fa-solid fa-circle-dot mr-1" style="font-size: 9px;"></i> Selesai
                                </span>
                                @endif
                            </td>
                            <td class="text-center">
                                @php
                                $bolehKembali = \Carbon\Carbon::now('Asia/Jakarta')->gte(
                                \Carbon\Carbon::parse($item->tanggal_kembali)->endOfDay()
                                );
                                @endphp

                                {{-- BOLEH KEMBALIKAN --}}
                                @if(($item->status == 'approved' || $item->status == 'terlambat') && $bolehKembali)
                                <form action="/peminjam/pengembalian/{{ $item->id }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm btn-modern">
                                        <i class="fa-solid fa-arrow-rotate-left mr-1"></i> Kembalikan
                                    </button>
                                </form>

                                {{-- BELUM WAKTUNYA --}}
                                @elseif(($item->status == 'approved' || $item->status == 'terlambat') && !$bolehKembali)
                                <button class="btn btn-light text-muted btn-sm btn-modern" style="cursor: not-allowed;" disabled>
                                    <i class="fa-solid fa-clock mr-1"></i> Belum Waktunya
                                </button>

                                {{-- MENUNGGU --}}
                                @elseif($item->status == 'menunggu_verifikasi')
                                <button class="btn btn-warning text-dark btn-sm btn-modern" style="cursor: not-allowed;" disabled>
                                    <i class="fa-solid fa-spinner fa-spin mr-1"></i> Menunggu
                                </button>

                                {{-- SELESAI --}}
                                @elseif($item->status == 'selesai' || $item->status == 'dikembalikan')
                                <button class="btn btn-outline-success btn-sm btn-modern" style="cursor: not-allowed;" disabled>
                                    <i class="fa-solid fa-circle-check mr-1"></i> Terverifikasi
                                </button>

                                {{-- DEFAULT --}}
                                @else
                                <button class="btn btn-secondary btn-sm btn-modern" disabled>
                                    Tidak Ada
                                </button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <div class="mb-3" style="font-size: 40px; color: #cbd5e0;">📦</div>
                                <h6 class="font-weight-bold mb-1">Tidak Ada Data Pengembalian</h6>
                                <p class="text-muted small mb-0">Seluruh riwayat pengembalian alat Anda akan tercantum di sini.</p>
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
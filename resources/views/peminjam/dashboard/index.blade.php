@extends('layouts.apppeminjam')

@section('content')

<style>
    body {
        background: #f4f6f9;
    }

    /* Hero Banner Modern Gradasi */
    .hero {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #0ea5e9 100%);
        border-radius: 24px;
        padding: 40px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(37, 99, 235, .18);
    }

    .hero::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.06);
        border-radius: 50%;
        top: -100px;
        right: -50px;
    }

    .hero::after {
        content: '';
        position: absolute;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.04);
        border-radius: 50%;
        bottom: -30px;
        left: 20%;
    }

    /* Card Modern Efek Hover Glow & Pop-up */
    .card-modern {
        border: none;
        border-radius: 22px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .04);
        background: white;
    }

    .card-modern:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* Box Lingkaran Ikon Custom */
    .icon-box {
        width: 65px;
        height: 65px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin: 0 auto;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    }

    /* Variasi Warna Gradasi untuk Grid Box */
    .bg-gradient-blue {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        color: #1e40af;
    }

    .bg-gradient-amber {
        background: linear-gradient(135deg, #fffbeb, #fef3c7);
        color: #b45309;
    }

    .bg-gradient-emerald {
        background: linear-gradient(135deg, #ecfdf5, #d1fae5);
        color: #065f46;
    }

    /* Desain Badge Status Bulat */
    .badge-status {
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
        display: inline-block;
    }

    .table td {
        vertical-align: middle;
    }

    .table th {
        font-weight: 700;
        color: #475569;
        background-color: #f8fafc;
        border-bottom: 2px solid #e2e8f0;
    }

    /* Tombol Menu Modern */
    .btn-custom {
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 600;
        transition: 0.2s;
    }
</style>

<div class="container-fluid py-2">

    {{-- HEADER / HERO BANNER --}}
    <div class="hero mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold mb-2">
                    👋 Halo, {{ auth()->user()->nama }}
                </h2>
                <p class="mb-0 opacity-90">
                    Sistem pelayanan mandiri. Kelola dan ajukan peminjaman alat praktik dengan cepat.
                </p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <h5 class="mb-1">
                    <i class="far fa-calendar-alt mr-2"></i>{{ now()->format('d F Y') }}
                </h5>
                <small class="opacity-75">
                    Sistem UKK RPL 2026
                </small>
            </div>
        </div>
    </div>

    {{-- STATISTIK (CARD WARNA-WARNI LEMBUT) --}}
    <div class="row g-4">
        {{-- CARD TOTAL PINJAMAN (BIRU) --}}
        <div class="col-md-4 mb-3">
            <div class="card card-modern border-top border-primary" style="border-width: 4px !important;">
                <div class="card-body text-center py-4">
                    <div class="icon-box bg-gradient-blue mb-3">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h5 class="text-muted font-weight-bold small text-uppercase">Total Pinjaman</h5>
                    <h1 class="display-4 font-weight-bold text-primary mb-0">{{ $totalPinjaman }}</h1>
                </div>
            </div>
        </div>

        {{-- CARD SEDANG DIPINJAM (AMBER/KUNING) --}}
        <div class="col-md-4 mb-3">
            <div class="card card-modern border-top border-warning" style="border-width: 4px !important;">
                <div class="card-body text-center py-4">
                    <div class="icon-box bg-gradient-amber mb-3">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <h5 class="text-muted font-weight-bold small text-uppercase">Sedang Dipinjam</h5>
                    <h1 class="display-4 font-weight-bold text-warning mb-0">{{ $dipinjam }}</h1>
                </div>
            </div>
        </div>

        {{-- CARD SELESAI (EMERALD/HIJAU) --}}
        <div class="col-md-4 mb-3">
            <div class="card card-modern border-top border-success" style="border-width: 4px !important;">
                <div class="card-body text-center py-4">
                    <div class="icon-box bg-gradient-emerald mb-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h5 class="text-muted font-weight-bold small text-uppercase">Selesai Kembali</h5>
                    <h1 class="display-4 font-weight-bold text-success mb-0">{{ $selesai }}</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- QUICK MENU UTAMA --}}
    <div class="row mt-2">
        {{-- MENU PINJAM ALAT --}}
        <div class="col-md-6 mb-4">
            <div class="card card-modern border-0">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="p-3 bg-light text-primary rounded-circle mr-4 d-none d-sm-block">
                        <i class="fas fa-tools fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="font-weight-bold text-dark mb-1">
                            📋 Ajukan Pinjam Alat
                        </h4>
                        <p class="text-muted small">
                            Eksplorasi inventaris laboratorium sekolah, cek sisa stok, dan buat tiket pengajuan.
                        </p>
                        <a href="/peminjam/alat" class="btn btn-primary btn-custom shadow-sm mt-1">
                            <i class="fas fa-search mr-2"></i>Lihat Katalog Alat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- MENU STATUS PEMINJAMAN --}}
        <div class="col-md-6 mb-4">
            <div class="card card-modern border-0">
                <div class="card-body d-flex align-items-center p-4">
                    <div class="p-3 bg-light text-success rounded-circle mr-4 d-none d-sm-block">
                        <i class="fas fa-file-invoice fa-2x"></i>
                    </div>
                    <div>
                        <h4 class="font-weight-bold text-dark mb-1">
                            📄 Pantau Status Approval
                        </h4>
                        <p class="text-muted small">
                            Periksa apakah pengajuan Anda disetujui petugas atau sudah waktunya dikembalikan.
                        </p>
                        <a href="/peminjam/status" class="btn btn-success btn-custom shadow-sm mt-1">
                            <i class="fas fa-eye mr-2"></i>Cek Status Tiket
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL RIWAYAT TERBARU --}}
    <div class="card card-modern mt-2">
        <div class="card-header bg-white py-3 border-0 d-flex align-items-center justify-content-between">
            <h5 class="mb-0 font-weight-bold text-dark">
                <i class="fas fa-history mr-2 text-secondary"></i> Aktivitas Transaksi Terbaru
            </h5>
            <span class="badge bg-light text-dark border px-3 py-2 font-weight-bold">Log Logistik</span>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="pl-4">Nama Alat Alat</th>
                            <th class="text-center">Status Transaksi</th>
                            <th>Tanggal Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($terbaru as $item)
                        <tr>
                            <td class="pl-4 font-weight-bold text-dark">
                                {{ $item->alat->nama_alat ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{-- Logika Badge Warna Dinamis Menyesuaikan Tema Petugas & Admin --}}
                                @if($item->status == 'pending' || $item->status == 'menunggu_verifikasi')
                                <span class="badge-status bg-warning text-dark border border-warning shadow-sm">
                                    <i class="fas fa-clock mr-1"></i> PENDING
                                </span>
                                @elseif($item->status == 'approved' || $item->status == 'dipinjam')
                                <span class="badge-status bg-info text-white shadow-sm">
                                    <i class="fas fa-hand-holding mr-1"></i> DIPINJAM
                                </span>
                                @elseif($item->status == 'selesai' || $item->status == 'kembali')
                                <span class="badge-status bg-success text-white shadow-sm">
                                    <i class="fas fa-check mr-1"></i> SELESAI
                                </span>
                                @elseif($item->status == 'ditolak' || $item->status == 'rejected')
                                <span class="badge-status bg-danger text-white shadow-sm">
                                    <i class="fas fa-times-circle mr-1"></i> DITOLAK
                                </span>
                                @else
                                <span class="badge-status bg-secondary text-white shadow-sm">
                                    {{ strtoupper($item->status) }}
                                </span>
                                @endif
                            </td>
                            <td class="text-muted">
                                <i class="far fa-calendar mr-1 small"></i>
                                {{ $item->created_at->format('d M Y • H:i') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-5">
                                <i class="fas fa-inbox fa-3x d-block mb-3 opacity-40"></i>
                                Kamu belum pernah melakukan aktivitas peminjaman alat apa pun.
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
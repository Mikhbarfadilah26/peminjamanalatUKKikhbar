@extends('layouts.apppetugas')

@section('content')

<style>

    body{
        background: #f4f6f9;
    }

    .dashboard-header{
        background: linear-gradient(135deg,#0f172a,#1e293b);
        border-radius: 20px;
        padding: 35px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .dashboard-header::before{
        content: '';
        position: absolute;
        width: 250px;
        height: 250px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
        top: -80px;
        right: -80px;
    }

    .dashboard-header h3{
        font-weight: 700;
        font-size: 32px;
    }

    .stat-card{
        border: none;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        transition: 0.3s;
    }

    .stat-card:hover{
        transform: translateY(-5px);
    }

    .stat-card .card-body{
        padding: 28px;
    }

    .stat-card h5{
        font-size: 17px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .stat-card h2{
        font-size: 38px;
        font-weight: bold;
        margin-bottom: 0;
    }

    .stat-icon{
        position: absolute;
        right: 20px;
        bottom: 15px;
        font-size: 55px;
        opacity: 0.2;
    }

    .bg-gradient-primary{
        background: linear-gradient(135deg,#2563eb,#1d4ed8);
    }

    .bg-gradient-warning{
        background: linear-gradient(135deg,#facc15,#eab308);
        color: #111;
    }

    .bg-gradient-success{
        background: linear-gradient(135deg,#22c55e,#16a34a);
    }

    .bg-gradient-danger{
        background: linear-gradient(135deg,#ef4444,#dc2626);
    }

    .table-card{
        border: none;
        border-radius: 20px;
        overflow: hidden;
    }

    .table-card .card-header{
        background: linear-gradient(135deg,#2563eb,#1e40af);
        color: white;
        padding: 18px 25px;
        border: none;
    }

    .table-card .card-header h5{
        margin: 0;
        font-weight: 600;
    }

    .table thead{
        background: #f1f5f9;
    }

    .table th{
        font-weight: 700;
        color: #334155;
    }

    .table td{
        vertical-align: middle;
    }

    .badge-status{
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
    }

    .badge-pending{
        background: #fef3c7;
        color: #92400e;
    }

    .badge-approved{
        background: #dcfce7;
        color: #166534;
    }

    .badge-default{
        background: #dbeafe;
        color: #1e40af;
    }

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="dashboard-header mb-4">

        <h3>
            👨‍🔧 Dashboard Petugas
        </h3>

        <p class="mb-0 mt-2">
            Monitoring peminjaman & pengembalian alat sekolah
        </p>

    </div>

    {{-- CARD STAT --}}
    <div class="row g-4">

        <div class="col-md-3">

            <div class="card stat-card bg-gradient-primary text-white shadow">

                <div class="card-body">

                    <h5>Total Peminjaman</h5>

                    <h2>{{ $peminjaman }}</h2>

                    <i class="fas fa-handshake stat-icon"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card stat-card bg-gradient-warning shadow">

                <div class="card-body">

                    <h5>Total Pending</h5>

                    <h2>{{ $pending }}</h2>

                    <i class="fas fa-clock stat-icon"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card stat-card bg-gradient-success text-white shadow">

                <div class="card-body">

                    <h5>Total Approved</h5>

                    <h2>{{ $approved }}</h2>

                    <i class="fas fa-check-circle stat-icon"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card stat-card bg-gradient-danger text-white shadow">

                <div class="card-body">

                    <h5>Total Pengembalian</h5>

                    <h2>{{ $pengembalian }}</h2>

                    <i class="fas fa-undo-alt stat-icon"></i>

                </div>

            </div>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="card table-card shadow mt-5">

        <div class="card-header">

            <h5>
                📋 5 Peminjaman Terbaru
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead>

                        <tr>
                            <th>User</th>
                            <th>Alat</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($terbaruPeminjaman as $item)

                        <tr>

                            <td>
                                <strong>
                                    {{ $item->user->nama }}
                                </strong>
                            </td>

                            <td>
                                {{ $item->alat->nama_alat }}
                            </td>

                            <td>
                                {{ $item->jumlah }}
                            </td>

                            <td>

                                @if($item->status == 'pending')

                                    <span class="badge-status badge-pending">
                                        Pending
                                    </span>

                                @elseif($item->status == 'approved')

                                    <span class="badge-status badge-approved">
                                        Approved
                                    </span>

                                @else

                                    <span class="badge-status badge-default">
                                        {{ $item->status }}
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center text-muted py-4">

                                Belum ada data peminjaman

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
@extends('layouts.appadmin')

@section('content')

<style>

.stat-box{
    border-radius:15px;
    color:white;
    padding:20px;
    margin-bottom:20px;
}

.stat-blue{
    background:linear-gradient(135deg,#3b82f6,#1d4ed8);
}

.stat-green{
    background:linear-gradient(135deg,#10b981,#059669);
}

.stat-orange{
    background:linear-gradient(135deg,#f59e0b,#d97706);
}

.stat-red{
    background:linear-gradient(135deg,#ef4444,#dc2626);
}

.stat-box h3{
    margin:0;
    font-weight:bold;
}

.stat-box p{
    margin:0;
    opacity:.9;
}

.card-custom{
    border:none;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.card-header-custom{
    background:#343a40;
    color:white;
    padding:15px 20px;
}

.filter-box{
    background:#f8f9fa;
    border-radius:10px;
    padding:20px;
    margin-bottom:20px;
}

.table thead{
    background:#343a40;
    color:white;
}

.table td,
.table th{
    vertical-align:middle;
}

.badge{
    padding:8px 12px;
    font-size:12px;
}

.page-title{
    font-weight:bold;
}

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h3 class="page-title">

            <i class="fas fa-chart-bar text-primary"></i>

            Laporan Transaksi Alat

        </h3>

        <small class="text-muted">
            Monitoring data peminjaman dan pengembalian alat
        </small>

    </div>

    {{-- STATISTIK --}}
    <div class="row">

        <div class="col-md-3">

            <div class="stat-box stat-blue">

                <h3>{{ $data->count() }}</h3>

                <p>Total Transaksi</p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="stat-box stat-orange">

                <h3>
                    {{ $data->where('status','pending')->count() }}
                </h3>

                <p>Pending</p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="stat-box stat-green">

                <h3>
                    {{ $data->where('status','approved')->count() }}
                </h3>

                <p>Sedang Dipinjam</p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="stat-box stat-red">

                <h3>
                    {{ $data->where('status','selesai')->count() }}
                </h3>

                <p>Selesai</p>

            </div>

        </div>

    </div>

    {{-- CARD --}}
    <div class="card card-custom">

        <div class="card-header card-header-custom">

            <h5 class="mb-0">

                <i class="fas fa-file-alt mr-2"></i>

                Data Laporan

            </h5>

        </div>

        <div class="card-body">

            {{-- FILTER --}}
            <div class="filter-box">

                <form method="GET">

                    <div class="row">

                        <div class="col-md-3">

                            <label>Tanggal Mulai</label>

                            <input
                                type="date"
                                name="mulai"
                                value="{{ $mulai }}"
                                class="form-control">

                        </div>

                        <div class="col-md-3">

                            <label>Tanggal Sampai</label>

                            <input
                                type="date"
                                name="sampai"
                                value="{{ $sampai }}"
                                class="form-control">

                        </div>

                        <div class="col-md-3">

                            <label>Status</label>

                            <select
                                name="status"
                                class="form-control">

                                <option value="semua"
                                    {{ $status=='semua' ? 'selected' : '' }}>
                                    Semua
                                </option>

                                <option value="pending"
                                    {{ $status=='pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="approved"
                                    {{ $status=='approved' ? 'selected' : '' }}>
                                    Sedang Dipinjam
                                </option>

                                <option value="menunggu_verifikasi"
                                    {{ $status=='menunggu_verifikasi' ? 'selected' : '' }}>
                                    Menunggu Verifikasi
                                </option>

                                <option value="selesai"
                                    {{ $status=='selesai' ? 'selected' : '' }}>
                                    Selesai
                                </option>

                            </select>

                        </div>

                        <div class="col-md-3 d-flex align-items-end">

                            <button
                                class="btn btn-primary mr-2">

                                <i class="fas fa-search mr-1"></i>

                                Filter

                            </button>

                            <a
                                href="{{ route('admin.laporan.cetak',[
                                    'mulai'=>$mulai,
                                    'sampai'=>$sampai,
                                    'status'=>$status
                                ]) }}"
                                target="_blank"
                                class="btn btn-success">

                                <i class="fas fa-print mr-1"></i>

                                Cetak

                            </a>

                        </div>

                    </div>

                </form>

            </div>

            {{-- TABEL --}}
            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>

                            <th width="60">No</th>
                            <th>Peminjam</th>
                            <th>Alat</th>
                            <th width="100">Jumlah</th>
                            <th width="180">Tanggal</th>
                            <th width="180">Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <strong>
                                    {{ $item->user->nama ?? '-' }}
                                </strong>

                            </td>

                            <td>

                                {{ $item->alat->nama_alat ?? '-' }}

                            </td>

                            <td>

                                {{ $item->jumlah }}

                            </td>

                            <td>

                                {{ $item->created_at->format('d-m-Y H:i') }}

                            </td>

                            <td>

                                @if($item->status=='pending')

                                    <span class="badge badge-warning">

                                        PENDING

                                    </span>

                                @elseif($item->status=='approved')

                                    <span class="badge badge-primary">

                                        DIPINJAM

                                    </span>

                                @elseif($item->status=='menunggu_verifikasi')

                                    <span class="badge badge-info">

                                        MENUNGGU VERIFIKASI

                                    </span>

                                @elseif($item->status=='selesai')

                                    <span class="badge badge-success">

                                        SELESAI

                                    </span>

                                @else

                                    <span class="badge badge-secondary">

                                        {{ strtoupper($item->status) }}

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center">

                                <i class="fas fa-folder-open mr-2"></i>

                                Tidak ada data laporan

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
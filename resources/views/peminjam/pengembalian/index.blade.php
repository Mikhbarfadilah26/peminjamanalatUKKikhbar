@extends('layouts.apppeminjam')

@section('content')

<style>

    body{
        background: #f4f6f9;
    }

    .card-box{
        border: none;
        border-radius: 16px;
    }

    .stat-card{
        border-radius: 16px;
        color: white;
    }

    .table-card{
        border-radius: 16px;
        border: none;
    }

    .badge-status{
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
    }

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="card card-box bg-primary text-white mb-4">

        <div class="card-body">

            <h3 class="mb-1">
                Pengembalian Alat
            </h3>

            <small>
                Kelola pengembalian alat
            </small>

        </div>

    </div>


    {{-- STATISTIK --}}
    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card stat-card bg-primary shadow-sm">

                <div class="card-body">

                    <h6>Total</h6>

                    <h2>{{ $peminjaman }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card stat-card bg-warning shadow-sm">

                <div class="card-body">

                    <h6>Pending</h6>

                    <h2>{{ $pending }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card stat-card bg-success shadow-sm">

                <div class="card-body">

                    <h6>Dipinjam</h6>

                    <h2>{{ $approved }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card stat-card bg-danger shadow-sm">

                <div class="card-body">

                    <h6>Verifikasi</h6>

                    <h2>{{ $pengembalian }}</h2>

                </div>

            </div>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="card table-card shadow-sm mt-3">

        <div class="card-header bg-white">

            <strong>
                Data Pengembalian
            </strong>

        </div>

        <div class="card-body">

            {{-- ALERT --}}
            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif


            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Jumlah</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
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
                                {{ $item->alat->nama_alat }}
                            </td>

                            <td>
                                {{ $item->jumlah }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') }}
                            </td>

                            <td>

                                @if($item->status == 'pending')

                                    <span class="badge bg-warning badge-status">
                                        Pending
                                    </span>

                                @elseif($item->status == 'approved')

                                    <span class="badge bg-primary badge-status">
                                        Dipinjam
                                    </span>

                                @elseif($item->status == 'terlambat')

                                    <span class="badge bg-danger badge-status">
                                        Terlambat
                                    </span>

                                @elseif($item->status == 'menunggu_verifikasi')

                                    <span class="badge bg-info badge-status">
                                        Menunggu Verifikasi
                                    </span>

                                @elseif(
                                    $item->status == 'selesai'
                                    ||
                                    $item->status == 'dikembalikan'
                                )

                                    <span class="badge bg-success badge-status">
                                        Selesai
                                    </span>

                                @endif

                            </td>

                            <td>

                                @php

                                    $bolehKembali =
                                    \Carbon\Carbon::now('Asia/Jakarta')
                                    ->gte(
                                        \Carbon\Carbon::parse(
                                            $item->tanggal_kembali
                                        )->endOfDay()
                                    );

                                @endphp


                                {{-- BOLEH KEMBALIKAN --}}
                                @if(
                                    (
                                        $item->status == 'approved'
                                        ||
                                        $item->status == 'terlambat'
                                    )
                                    &&
                                    $bolehKembali
                                )

                                    <form action="/peminjam/pengembalian/{{ $item->id }}"
                                        method="POST">

                                        @csrf

                                        <button class="btn btn-success btn-sm">

                                            Kembalikan

                                        </button>

                                    </form>


                                {{-- BELUM WAKTUNYA --}}
                                @elseif(
                                    (
                                        $item->status == 'approved'
                                        ||
                                        $item->status == 'terlambat'
                                    )
                                    &&
                                    !$bolehKembali
                                )

                                    <button class="btn btn-secondary btn-sm" disabled>

                                        Belum Waktunya

                                    </button>


                                {{-- MENUNGGU --}}
                                @elseif($item->status == 'menunggu_verifikasi')

                                    <button class="btn btn-warning btn-sm" disabled>

                                        Menunggu

                                    </button>


                                {{-- SELESAI --}}
                                @elseif(
                                    $item->status == 'selesai'
                                    ||
                                    $item->status == 'dikembalikan'
                                )

                                    <button class="btn btn-success btn-sm" disabled>

                                        Selesai

                                    </button>


                                {{-- DEFAULT --}}
                                @else

                                    <button class="btn btn-secondary btn-sm" disabled>

                                        Tidak Ada

                                    </button>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                                class="text-center text-muted">

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

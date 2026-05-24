@extends('layouts.apppetugas')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="bg-dark text-white p-4 rounded mb-4 shadow">

        <h3 class="mb-1">
            👨‍🔧 Dashboard Petugas
        </h3>

        <p class="mb-0">
            Monitoring peminjaman & pengembalian alat
        </p>

    </div>

    {{-- CARD STAT --}}
    <div class="row">

        <div class="col-md-3">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Peminjaman</h5>
                    <h3>{{ $peminjaman }}</h3>
                    <i class="fas fa-handshake fa-2x float-right"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-dark shadow">
                <div class="card-body">
                    <h5>Pending</h5>
                    <h3>{{ $pending }}</h3>
                    <i class="fas fa-clock fa-2x float-right"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5>Approved</h5>
                    <h3>{{ $approved }}</h3>
                    <i class="fas fa-check fa-2x float-right"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5>Pengembalian</h5>
                    <h3>{{ $pengembalian }}</h3>
                    <i class="fas fa-undo fa-2x float-right"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE TERBARU --}}
    <div class="card mt-4 shadow">

        <div class="card-header bg-primary text-white">
            <h5>5 Peminjaman Terbaru</h5>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

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

                    @foreach($terbaruPeminjaman as $item)

                    <tr>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->alat->nama_alat }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>{{ $item->created_at }}</td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
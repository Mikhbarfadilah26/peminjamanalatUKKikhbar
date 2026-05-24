@extends('layouts.apppeminjam')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="bg-primary text-white p-4 rounded shadow-sm mb-4">

        <h3 class="fw-bold mb-1">

            <i class="fas fa-handshake me-2"></i>

            Status Peminjaman Saya

        </h3>

        <small>
            Melihat status peminjaman alat
        </small>

    </div>

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

    {{-- TABLE --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="60">No</th>

                            <th>Foto</th>

                            <th>Nama Alat</th>

                            <th>Tanggal Pinjam</th>

                            <th>Jatuh Tempo</th>

                            <th>Jumlah</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                {{-- FOTO --}}
                                <td width="120">

                                    @if($item->alat->foto)

                                        <img src="{{ asset('foto/alat/'.$item->alat->foto) }}"
                                            width="90"
                                            height="70"
                                            class="rounded shadow-sm"
                                            style="object-fit:cover;">

                                    @else

                                        <span class="text-muted">
                                            Tidak ada foto
                                        </span>

                                    @endif

                                </td>

                                {{-- NAMA --}}
                                <td>

                                    <div class="fw-bold">

                                        {{ $item->alat->nama_alat }}

                                    </div>

                                    <small class="text-muted">

                                        Kondisi :
                                        {{ $item->alat->kondisi }}

                                    </small>

                                </td>

                                {{-- TGL --}}
                                <td>

                                    {{ $item->tanggal_pinjam }}

                                </td>

                                <td>

                                    {{ $item->tanggal_kembali }}

                                </td>

                                {{-- JUMLAH --}}
                                <td>

                                    {{ $item->jumlah }}

                                </td>

                                {{-- STATUS --}}
                                <td>

                                    @if($item->status == 'pending')

                                        <span class="badge bg-warning text-dark px-3 py-2">

                                            <i class="fas fa-clock me-1"></i>

                                            Menunggu Persetujuan

                                        </span>

                                    @elseif($item->status == 'approved')

                                        <span class="badge bg-success px-3 py-2">

                                            <i class="fas fa-check-circle me-1"></i>

                                            Disetujui

                                        </span>

                                    @elseif($item->status == 'rejected')

                                        <span class="badge bg-danger px-3 py-2">

                                            <i class="fas fa-times-circle me-1"></i>

                                            Ditolak

                                        </span>

                                    @elseif($item->status == 'selesai')

                                        <span class="badge bg-primary px-3 py-2">

                                            <i class="fas fa-box me-1"></i>

                                            Selesai

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center text-muted py-4">

                                    <i class="fas fa-box-open fa-2x mb-2"></i>

                                    <br>

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
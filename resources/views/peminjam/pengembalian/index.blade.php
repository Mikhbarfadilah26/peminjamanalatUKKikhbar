@extends('layouts.apppeminjam')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0">

        {{-- HEADER --}}
        <div class="card-header bg-primary text-white">

            <h4 class="mb-0 fw-bold">

                <i class="fas fa-undo-alt me-2"></i>

                Pengembalian Alat

            </h4>

        </div>

        {{-- BODY --}}
        <div class="card-body">

            {{-- ALERT --}}
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>

                </div>

            @endif


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="5%">No</th>

                            <th>Nama Alat</th>

                            <th>Tanggal Pinjam</th>

                            <th>Status</th>

                            <th width="20%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                            <tr>

                                {{-- NOMOR --}}
                                <td>

                                    {{ $loop->iteration }}

                                </td>


                                {{-- NAMA ALAT --}}
                                <td>

                                    <div class="fw-semibold">

                                        {{ $item->alat->nama_alat }}

                                    </div>

                                </td>


                                {{-- TANGGAL --}}
                                <td>

                                    {{ $item->created_at->format('d M Y') }}

                                </td>


                                {{-- STATUS --}}
                                <td>

                                    @php
                                        $status = strtolower($item->status);
                                    @endphp

                                    @if($status == 'dipinjam')

                                        <span class="badge bg-warning text-dark px-3 py-2">

                                            Dipinjam

                                        </span>

                                    @elseif($status == 'selesai')

                                        <span class="badge bg-success px-3 py-2">

                                            Selesai

                                        </span>

                                    @elseif($status == 'dikembalikan')

                                        <span class="badge bg-primary px-3 py-2">

                                            Dikembalikan

                                        </span>

                                    @elseif($status == 'menunggu_verifikasi')

                                        <span class="badge bg-info px-3 py-2">

                                            Menunggu Verifikasi

                                        </span>

                                    @else

                                        <span class="badge bg-secondary px-3 py-2">

                                            {{ $item->status }}

                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    @if($status == 'dipinjam')

                                        <form action="/peminjam/pengembalian/{{ $item->id }}"
                                            method="POST">

                                            @csrf

                                            <button type="submit"
                                                class="btn btn-success btn-sm w-100">

                                                <i class="fas fa-check-circle me-1"></i>

                                                Kembalikan

                                            </button>

                                        </form>

                                    @elseif($status == 'menunggu_verifikasi')

                                        <button class="btn btn-warning btn-sm w-100"
                                            disabled>

                                            <i class="fas fa-clock me-1"></i>

                                            Menunggu Verifikasi

                                        </button>

                                    @else

                                        <button class="btn btn-secondary btn-sm w-100"
                                            disabled>

                                            <i class="fas fa-check me-1"></i>

                                            Sudah Selesai

                                        </button>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center text-muted py-4">

                                    <i class="fas fa-box-open fa-2x mb-2"></i>

                                    <br>

                                    Tidak ada data pengembalian

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
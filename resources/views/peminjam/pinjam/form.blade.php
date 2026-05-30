@extends('layouts.apppeminjam')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-11">

            <div class="card shadow-sm border-0 rounded-4 custom-card overflow-hidden">

                <div class="row g-0">

                    {{-- FOTO ALAT --}}
                    <div class="col-md-6 bg-light position-relative">

                        <img
                            src="{{ asset('foto/alat/'.$alat->foto) }}"
                            alt="{{ $alat->nama_alat }}"
                            class="w-100 h-100 img-alat">

                    </div>

                    {{-- FORM --}}
                    <div class="col-md-6">

                        <div class="p-4 p-lg-5 bg-white h-100 d-flex flex-column justify-content-center">

                            <h2 class="fw-bold mb-2 text-dark">

                                {{ $alat->nama_alat }}

                            </h2>

                            <p class="text-muted mb-4">

                                Silahkan isi form peminjaman alat dengan lengkap.

                            </p>

                            {{-- INFO ALAT --}}
                            <div class="mb-4">

                                <div class="mb-2">

                                    <span class="fw-semibold">
                                        Kategori :
                                    </span>

                                    <span class="text-muted">
                                        {{ $alat->kategori->nama_kategori ?? '-' }}
                                    </span>

                                </div>

                                <div class="mb-2">

                                    <span class="fw-semibold">
                                        Stok :
                                    </span>

                                    <span class="text-muted">
                                        {{ $alat->stok }}
                                    </span>

                                </div>

                                <div class="mb-2">

                                    <span class="fw-semibold">
                                        Kondisi :
                                    </span>

                                    <span class="text-muted">
                                        {{ $alat->kondisi }}
                                    </span>

                                </div>

                            </div>

                            {{-- ALERT --}}
                            @if(session('error'))

                            <div class="alert alert-danger">

                                {{ session('error') }}

                            </div>

                            @endif

                            {{-- FORM PEMINJAMAN --}}
                            <form
                                action="{{ route('peminjam.pinjam.store',$alat->id) }}"
                                method="POST">

                                @csrf

                                {{-- JUMLAH --}}
                                <div class="mb-4">

                                    <label class="form-label fw-semibold">

                                        Jumlah Pinjam

                                    </label>

                                    <input
                                        type="number"
                                        name="jumlah"
                                        class="form-control form-control-lg"
                                        min="1"
                                        max="{{ $alat->stok }}"
                                        value="1"
                                        required>

                                    <small class="text-muted">

                                        Maksimal {{ $alat->stok }} alat

                                    </small>

                                </div>

                                {{-- LAMA PINJAM --}}
                                <div class="mb-4">

                                    <label class="form-label fw-semibold">

                                        Lama Pinjam

                                    </label>

                                    <select
                                        name="lama_hari"
                                        class="form-select form-select-lg"
                                        required>

                                        <option value="">
                                            Pilih Lama Pinjam
                                        </option>

                                        <option value="1">
                                            1 Hari
                                        </option>

                                        <option value="2">
                                            2 Hari
                                        </option>

                                        <option value="3">
                                            3 Hari (Maksimal)
                                        </option>

                                    </select>

                                </div>

                                {{-- BUTTON --}}
                                <div class="d-grid gap-2">

                                    <button
                                        type="submit"
                                        class="btn btn-dark btn-lg">

                                        Ajukan Peminjaman

                                    </button>

                                    <a
                                        href="{{ route('peminjam.alat') }}"
                                        class="btn btn-outline-secondary btn-lg">

                                        Kembali

                                    </a>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

    body{
        background: #f4f6f9;
    }

    .custom-card{
        min-height: 650px;
    }

    .img-alat{
        object-fit: contain;
        min-height: 650px;
        padding: 25px;
        background: #fff;
    }

</style>

@endsection

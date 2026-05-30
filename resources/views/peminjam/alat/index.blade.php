@extends('layouts.apppeminjam')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h3 class="fw-bold mb-1">
                Daftar Alat
            </h3>

            <p class="text-muted mb-0">
                Pilih alat yang ingin dipinjam
            </p>

        </div>


        {{-- SEARCH --}}
        <div style="width:320px;">

            <div class="input-group">

                <span class="input-group-text bg-white">

                    <i class="fas fa-search"></i>

                </span>

                <input
                    type="text"
                    id="searchAlat"
                    class="form-control"
                    placeholder="Cari nama alat...">

            </div>

        </div>

    </div>


    {{-- ALERT --}}
    @if(session('success'))

    <div class="alert alert-success shadow-sm border-0">

        <i class="fas fa-check-circle me-2"></i>

        {{ session('success') }}

    </div>

    @endif


    @if(session('error'))

    <div class="alert alert-danger shadow-sm border-0">

        <i class="fas fa-times-circle me-2"></i>

        {{ session('error') }}

    </div>

    @endif



    {{-- CARD --}}
    <div class="row g-4" id="alatContainer">

        @forelse($data as $item)

        <div
            class="col-lg-3 col-md-6 alat-item"
            data-nama="{{ strtolower($item->nama_alat) }}">

            <div class="card border-0 shadow-sm h-100 alat-card">

                {{-- FOTO --}}
                <div class="position-relative">

                    <img
                        src="{{ asset('foto/alat/'.$item->foto) }}"
                        class="card-img-top alat-img"
                        alt="foto alat">

                </div>



                <div class="card-body d-flex flex-column">

                    {{-- NAMA ALAT --}}
                    <h5 class="fw-bold mb-2">

                        {{ $item->nama_alat }}

                    </h5>


                    {{-- KATEGORI --}}
                    <p class="text-muted small mb-2">

                        <i class="fas fa-layer-group me-1"></i>

                        {{ $item->kategori->nama_kategori ?? '-' }}

                    </p>


                    {{-- KONDISI --}}
                    <p class="mb-2">

                        @if($item->kondisi == 'baik')

                        <span class="badge bg-success">

                            <i class="fas fa-check me-1"></i>

                            Kondisi Baik

                        </span>

                        @else

                        <span class="badge bg-warning text-dark">

                            <i class="fas fa-tools me-1"></i>

                            {{ ucfirst($item->kondisi) }}

                        </span>

                        @endif

                    </p>


                    {{-- STATUS STOK --}}
                    <p class="mb-3">

                        @if($item->stok > 0)

                        <span class="badge bg-primary">

                            <i class="fas fa-box-open me-1"></i>

                            Tersedia :
                            {{ $item->stok }}

                        </span>

                        @else

                        <span class="badge bg-danger">

                            <i class="fas fa-times-circle me-1"></i>

                            Stok Habis

                        </span>

                        @endif

                    </p>


                    {{-- BUTTON --}}
                    <div class="mt-auto">

                        @if($item->stok > 0)

                        <a
                            href="{{ route('peminjam.pinjam.form',$item->id) }}"
                            class="btn btn-primary w-100 fw-bold btn-pinjam">

                            <i class="fas fa-handshake me-2"></i>

                            Pinjam Sekarang

                        </a>

                        @else

                        <button
                            class="btn btn-secondary w-100"
                            disabled>

                            <i class="fas fa-times-circle me-2"></i>

                            Stok Habis

                        </button>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-warning text-center shadow-sm">

                Belum ada data alat

            </div>

        </div>

        @endforelse


        {{-- HASIL KOSONG --}}
        <div
            class="col-12 d-none"
            id="emptySearch">

            <div class="alert alert-info text-center shadow-sm">

                Tidak ada alat ditemukan

            </div>

        </div>

    </div>

</div>



<style>
    .alat-card {
        border-radius: 20px;
        overflow: hidden;
        transition: .3s;
        background: #fff;
    }

    .alat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 35px rgba(0, 0, 0, .12);
    }

    .alat-img {
        height: 240px;
        width: 100%;
        object-fit: cover;
    }

    .btn-pinjam {
        border-radius: 12px;
        padding: 11px;
        transition: .3s;
    }

    .btn-pinjam:hover {
        transform: scale(1.02);
    }

    .input-group {
        box-shadow: 0 5px 15px rgba(0, 0, 0, .06);
        border-radius: 12px;
        overflow: hidden;
    }

    .form-control {
        height: 48px;
        border: none;
    }

    .form-control:focus {
        box-shadow: none;
    }

    .input-group-text {
        border: none;
    }

    .badge {
        padding: 8px 12px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
    }

    @media(max-width:768px) {

        .alat-img {
            height: 200px;
        }

    }
</style>



<script>
    const search =
        document.getElementById(
            'searchAlat'
        );

    const cards =
        document.querySelectorAll(
            '.alat-item'
        );

    const kosong =
        document.getElementById(
            'emptySearch'
        );


    search.addEventListener(
        'keyup',
        function() {

            let keyword =
                this.value
                .toLowerCase();

            let ditemukan =
                0;

            cards.forEach(
                card => {

                    let nama =
                        card.dataset.nama;

                    if (
                        nama.includes(
                            keyword
                        )
                    ) {

                        card.style.display = 'block';

                        ditemukan++;

                    } else {

                        card.style.display = 'none';

                    }

                });

            kosong.classList.toggle(
                'd-none',
                ditemukan > 0
            );

        }
    );
</script>

@endsection
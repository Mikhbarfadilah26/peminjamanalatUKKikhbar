@extends('layouts.apppetugas')

@section('content')

<div class="container-fluid py-3">

    {{-- HEADER --}}
    <div class="card border-0 shadow-lg mb-4 overflow-hidden">

        <div class="card-body text-white position-relative"
            style="
                background: linear-gradient(135deg,#198754,#20c997);
                border-radius: 18px;
            ">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-1">
                        📦 Data Alat
                    </h2>

                    <p class="mb-0 opacity-75">
                        Monitoring alat & stok tersedia
                    </p>

                </div>

                {{-- TOTAL STOK --}}
                <div class="text-end mt-3 mt-md-0">

                    <h6 class="mb-1 opacity-75">
                        Total Stok
                    </h6>

                    <h2 class="fw-bold mb-0">
                        {{ $data->sum('stok') }}
                    </h2>

                </div>

            </div>

        </div>

    </div>

{{-- FILTER --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <form method="GET">

            <div class="row align-items-end">

                {{-- FILTER KATEGORI --}}
                <div class="col-md-4 mb-3">

                    <label class="fw-bold mb-2">
                        Filter Kategori
                    </label>

                    <select name="kategori_id"
                        class="form-control">

                        <option value="">
                            -- Semua Kategori --
                        </option>

                        @foreach($kategori as $k)

                            <option value="{{ $k->id }}"
                                {{ request('kategori_id') == $k->id ? 'selected' : '' }}>

                                {{ $k->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>



                {{-- FILTER KONDISI --}}
                <div class="col-md-4 mb-3">

                    <label class="fw-bold mb-2">
                        Filter Kondisi
                    </label>

                    <select name="kondisi"
                        class="form-control">

                        <option value="">
                            -- Semua Kondisi --
                        </option>

                        <option value="baik"
                            {{ request('kondisi') == 'baik' ? 'selected' : '' }}>

                            Baik

                        </option>

                        <option value="rusak_ringan"
                            {{ request('kondisi') == 'rusak_ringan' ? 'selected' : '' }}>

                            Rusak Ringan

                        </option>

                        <option value="rusak_berat"
                            {{ request('kondisi') == 'rusak_berat' ? 'selected' : '' }}>

                            Rusak Berat

                        </option>

                    </select>

                </div>



                {{-- BUTTON --}}
                <div class="col-md-4 mb-3">

                    <button type="submit"
                        class="btn btn-success px-4">

                        🔍 Filter

                    </button>

                    <a href="{{ route('petugas.alat') }}"
                        class="btn btn-secondary px-4">

                        Reset

                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

    {{-- GRID CARD --}}
    <div class="row">

        @forelse($data as $item)

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

            <div class="card alat-card border-0 shadow-sm h-100">

                {{-- FOTO --}}
                <div class="position-relative overflow-hidden">

                    @if($item->foto)

                        <img src="{{ asset('foto/alat/' . $item->foto) }}"
                            class="card-img-top alat-img">

                    @else

                        <img src="https://via.placeholder.com/400x250"
                            class="card-img-top alat-img">

                    @endif

                    {{-- STATUS --}}
                    <div class="position-absolute top-0 end-0 m-2">

                        @if($item->status == 'tersedia')

                            <span class="badge bg-success px-3 py-2">
                                Tersedia
                            </span>

                        @elseif($item->status == 'dipinjam')

                            <span class="badge bg-warning px-3 py-2">
                                Dipinjam
                            </span>

                        @else

                            <span class="badge bg-danger px-3 py-2">
                                Rusak
                            </span>

                        @endif

                    </div>

                </div>


                {{-- BODY --}}
                <div class="card-body d-flex flex-column">

                    {{-- NAMA --}}
                    <h5 class="fw-bold mb-1 text-dark">
                        {{ $item->nama_alat }}
                    </h5>

                    {{-- KATEGORI --}}
                    <p class="text-muted mb-3">
                        {{ $item->kategori->nama_kategori ?? '-' }}
                    </p>


                    {{-- STOK --}}
                    <div class="mb-3">

                        <div class="d-flex justify-content-between mb-1">

                            <small class="fw-bold text-muted">
                                Stok
                            </small>

                            <small class="fw-bold text-success">
                                {{ $item->stok }} Unit
                            </small>

                        </div>

                        {{-- PROGRESS STOK --}}
                        <div class="progress"
                            style="height: 8px; border-radius: 20px;">

                            <div class="progress-bar bg-success"
                                role="progressbar"
                                style="width:
                            {{ min(($item->stok / 20) * 100, 100) }}%">

                            </div>

                        </div>

                    </div>


                    {{-- KONDISI --}}
                    <div class="mt-auto">

                        @if($item->kondisi == 'baik')

                            <span class="badge bg-success px-3 py-2">
                                Kondisi Baik
                            </span>

                        @elseif($item->kondisi == 'rusak_ringan')

                            <span class="badge bg-warning px-3 py-2">
                                Rusak Ringan
                            </span>

                        @else

                            <span class="badge bg-danger px-3 py-2">
                                Rusak Berat
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-danger shadow-sm">

                Data alat tidak ditemukan.

            </div>

        </div>

        @endforelse

    </div>

</div>


{{-- STYLE --}}
<style>

    body{
        background: #f4f6f9;
    }

    .alat-card{
        border-radius: 20px;
        overflow: hidden;
        transition: 0.3s;
    }

    .alat-card:hover{
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12) !important;
    }

    .alat-img{
        height: 220px;
        width: 100%;
        object-fit: cover;
        transition: 0.4s;
    }

    .alat-card:hover .alat-img{
        transform: scale(1.05);
    }

    .progress{
        background: #e9ecef;
    }

</style>

@endsection
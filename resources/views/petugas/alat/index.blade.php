@extends('layouts.apppetugas')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="bg-primary text-white p-4 rounded shadow mb-3">

        <h3 class="mb-0">📦 Data Alat</h3>
        <small>Monitoring alat & stok tersedia</small>

    </div>

    {{-- FILTER KATEGORI --}}
    <form method="GET" class="mb-3">

        <div class="row">

            <div class="col-md-4">

                <select name="kategori_id" class="form-control" onchange="this.form.submit()">

                    <option value="">-- Semua Kategori --</option>

                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}"
                            {{ request('kategori_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach

                </select>

            </div>

        </div>

    </form>

    {{-- GRID CARD --}}
    <div class="row">

        @foreach($data as $item)

        <div class="col-md-3 mb-4">

            <div class="card shadow h-100 border-0">

                {{-- FOTO --}}
                @if($item->foto)
                    <img src="{{ asset('foto/alat/' . $item->foto) }}"
                        class="card-img-top"
                        style="height:180px; object-fit:cover;">
                @else
                    <img src="https://via.placeholder.com/300x180"
                        class="card-img-top">
                @endif

                <div class="card-body">

                    <h5 class="font-weight-bold">
                        {{ $item->nama_alat }}
                    </h5>

                    <p class="text-muted mb-1">
                        {{ $item->kategori->nama_kategori ?? '-' }}
                    </p>

                    {{-- STOK --}}
                    <span class="badge bg-info">
                        Stok: {{ $item->stok }}
                    </span>

                    {{-- KONDISI --}}
                    @if($item->kondisi == 'baik')
                        <span class="badge bg-success">Baik</span>
                    @elseif($item->kondisi == 'rusak_ringan')
                        <span class="badge bg-warning">Ringan</span>
                    @else
                        <span class="badge bg-danger">Rusak</span>
                    @endif

                    <br><br>

                    {{-- STATUS --}}
                    @if($item->status == 'tersedia')
                        <span class="badge bg-success">Tersedia</span>
                    @elseif($item->status == 'dipinjam')
                        <span class="badge bg-warning">Dipinjam</span>
                    @else
                        <span class="badge bg-danger">Rusak</span>
                    @endif

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection
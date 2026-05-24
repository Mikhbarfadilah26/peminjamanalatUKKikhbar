@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-info text-white">

            <h5 class="mb-0">
                Detail Kategori
            </h5>

        </div>

        <div class="card-body">

            <h5 class="fw-bold">
                {{ $data->nama_kategori }}
            </h5>

            <p class="text-muted">
                {{ $data->deskripsi }}
            </p>

            <hr>

            <h6 class="fw-bold mb-3">
                Daftar Alat dalam Kategori
            </h6>

            @if($data->alat->count() > 0)

                <ul class="list-group">

                    @foreach($data->alat as $alat)

                        <li class="list-group-item">

                            {{ $alat->nama_alat }} 
                            (Stok: {{ $alat->stok }})

                        </li>

                    @endforeach

                </ul>

            @else

                <div class="alert alert-warning">

                    Belum ada alat dalam kategori ini

                </div>

            @endif

            <a href="{{ route('kategori.index') }}"
                class="btn btn-secondary mt-3">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection
@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h5 class="mb-0">
                Edit Kategori
            </h5>

        </div>

        <div class="card-body">

            <form action="{{ route('kategori.update', $data->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>Nama Kategori</label>

                    <input type="text"
                        name="nama_kategori"
                        value="{{ $data->nama_kategori }}"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea name="deskripsi"
                        class="form-control"
                        rows="4">{{ $data->deskripsi }}</textarea>

                </div>

                <button class="btn btn-warning">

                    Update

                </button>

                <a href="{{ route('kategori.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection
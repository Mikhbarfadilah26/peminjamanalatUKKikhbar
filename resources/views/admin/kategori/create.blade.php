@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Tambah Kategori
            </h5>

        </div>

        <div class="card-body">

            <form action="{{ route('kategori.store') }}"
                method="POST">

                @csrf

                <div class="mb-3">

                    <label>Nama Kategori</label>

                    <input type="text"
                        name="nama_kategori"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label>Deskripsi</label>

                    <textarea name="deskripsi"
                        class="form-control"
                        rows="4"></textarea>

                </div>

                <button class="btn btn-primary">

                    Simpan

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
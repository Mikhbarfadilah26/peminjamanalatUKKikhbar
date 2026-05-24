@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5>Tambah Alat</h5>

        </div>

        <div class="card-body">

            <form action="{{ route('alat.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label>Kategori</label>

                    <select name="kategori_id" class="form-control">

                        <option value="">-- Pilih Kategori --</option>

                        @foreach($kategori as $k)

                            <option value="{{ $k->id }}">
                                {{ $k->nama_kategori }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Nama Alat</label>

                    <input type="text" name="nama_alat" class="form-control">

                </div>

                <div class="mb-3">

                    <label>Stok</label>

                    <input type="number" name="stok" class="form-control">

                </div>

                <div class="mb-3">

                    <label>Kondisi</label>

                    <select name="kondisi" class="form-control">

                        <option value="baik">Baik</option>
                        <option value="rusak_ringan">Rusak Ringan</option>
                        <option value="rusak_berat">Rusak Berat</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="tersedia">Tersedia</option>
                        <option value="dipinjam">Dipinjam</option>
                        <option value="rusak">Rusak</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Foto</label>

                    <input type="file" name="foto" class="form-control">

                </div>

                <button class="btn btn-primary">Simpan</button>

                <a href="{{ route('alat.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>

    </div>

</div>

@endsection
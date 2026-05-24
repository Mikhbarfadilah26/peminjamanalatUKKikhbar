@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h5>Edit Alat</h5>

        </div>

        <div class="card-body">

            <form action="{{ route('alat.update', $data->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>Kategori</label>

                    <select name="kategori_id" class="form-control">

                        @foreach($kategori as $k)

                            <option value="{{ $k->id }}"
                                {{ $data->kategori_id == $k->id ? 'selected' : '' }}>

                                {{ $k->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Nama Alat</label>

                    <input type="text"
                        name="nama_alat"
                        value="{{ $data->nama_alat }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Stok</label>

                    <input type="number"
                        name="stok"
                        value="{{ $data->stok }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Kondisi</label>

                    <select name="kondisi" class="form-control">

                        <option value="baik" {{ $data->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>

                        <option value="rusak_ringan" {{ $data->kondisi == 'rusak_ringan' ? 'selected' : '' }}>
                            Rusak Ringan
                        </option>

                        <option value="rusak_berat" {{ $data->kondisi == 'rusak_berat' ? 'selected' : '' }}>
                            Rusak Berat
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="tersedia" {{ $data->status == 'tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="dipinjam" {{ $data->status == 'dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>

                        <option value="rusak" {{ $data->status == 'rusak' ? 'selected' : '' }}>
                            Rusak
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Foto</label>

                    <input type="file" name="foto" class="form-control">

                    @if($data->foto)

                        <img src="{{ asset('foto/alat/' . $data->foto) }}"
                            width="80"
                            class="mt-2 rounded">

                    @endif

                </div>

                <button class="btn btn-warning">Update</button>

                <a href="{{ route('alat.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>

    </div>

</div>

@endsection
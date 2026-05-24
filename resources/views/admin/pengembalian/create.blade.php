@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5>Tambah Pengembalian</h5>

        </div>

        <div class="card-body">

            <form action="{{ route('pengembalian.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label>Peminjaman</label>

                    <select name="peminjaman_id" class="form-control">

                        @foreach($peminjaman as $p)

                            <option value="{{ $p->id }}">
                                {{ $p->user->nama }} - {{ $p->alat->nama_alat }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label>Tanggal Pengembalian</label>

                    <input type="date" name="tanggal_pengembalian" class="form-control">

                </div>

                <div class="mb-3">

                    <label>Kondisi Kembali</label>

                    <select name="kondisi_kembali" class="form-control">

                        <option value="baik">Baik</option>
                        <option value="rusak">Rusak</option>

                    </select>

                </div>

                <button class="btn btn-success">
                    Proses Pengembalian
                </button>

            </form>

        </div>

    </div>

</div>

@endsection
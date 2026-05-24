@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">
                Tambah User
            </h5>

        </div>

        <div class="card-body">

            <form action="{{ route('user.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label>Nama</label>

                    <input type="text"
                        name="nama"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Username</label>

                    <input type="text"
                        name="username"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Password</label>

                    <input type="password"
                        name="password"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Role</label>

                    <select name="role"
                        class="form-control">

                        <option value="">-- Pilih --</option>

                        <option value="admin">Admin</option>

                        <option value="petugas">Petugas</option>

                        <option value="peminjam">Peminjam</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Foto</label>

                    <input type="file"
                        name="foto"
                        class="form-control">

                </div>

                <button class="btn btn-primary">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
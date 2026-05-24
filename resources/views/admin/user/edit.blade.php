@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-warning">

            <h5 class="mb-0">
                Edit User
            </h5>

        </div>

        <div class="card-body">

            <form action="{{ route('user.update', $data->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>Nama</label>

                    <input type="text"
                        name="nama"
                        value="{{ $data->nama }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Username</label>

                    <input type="text"
                        name="username"
                        value="{{ $data->username }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>Password Baru</label>

                    <input type="password"
                        name="password"
                        class="form-control">

                    <small class="text-muted">
                        Kosongkan jika tidak diubah
                    </small>

                </div>

                <div class="mb-3">

                    <label>Role</label>

                    <select name="role"
                        class="form-control">

                        <option value="admin"
                            {{ $data->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="petugas"
                            {{ $data->role == 'petugas' ? 'selected' : '' }}>
                            Petugas
                        </option>

                        <option value="peminjam"
                            {{ $data->role == 'peminjam' ? 'selected' : '' }}>
                            Peminjam
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Foto</label>

                    <input type="file"
                        name="foto"
                        class="form-control">

                </div>

                @if($data->foto)

                <img src="{{ asset('foto/user/' . $data->foto) }}"
                    width="100"
                    class="mb-3">

                @endif

                <br>

                <button class="btn btn-warning">

                    Update

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
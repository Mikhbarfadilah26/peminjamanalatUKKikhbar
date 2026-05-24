@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        {{-- HEADER --}}
        <div class="card-header border-0 py-3"
            style="background: linear-gradient(135deg, #0f172a, #1e293b);">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h4 class="mb-1 text-white fw-bold">

                        <i class="fas fa-users me-2 text-info"></i>

                        Data User

                    </h4>

                    <small class="text-light opacity-75">

                        Management pengguna sistem peminjaman alat

                    </small>

                </div>

                <a href="{{ route('user.create') }}"
                    class="btn btn-info fw-bold rounded-pill px-4 shadow-sm">

                    <i class="fas fa-plus-circle me-2"></i>

                    Tambah User

                </a>

            </div>

        </div>

        {{-- BODY --}}
        <div class="card-body bg-white">

            @if(session('success'))

                <div class="alert alert-success border-0 shadow-sm rounded-3">

                    <i class="fas fa-check-circle me-2"></i>

                    {{ session('success') }}

                </div>

            @endif

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead>

                        <tr
                            style="background: #f1f5f9;">

                            <th class="fw-bold text-secondary">No</th>

                            <th class="fw-bold text-secondary">
                                Foto
                            </th>

                            <th class="fw-bold text-secondary">
                                Nama
                            </th>

                            <th class="fw-bold text-secondary">
                                Username
                            </th>

                            <th class="fw-bold text-secondary">
                                Role
                            </th>

                            <th class="fw-bold text-secondary text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr class="border-bottom">

                            <td class="fw-semibold text-dark">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                @if($item->foto)

                                    <img src="{{ asset('foto/user/' . $item->foto) }}"
                                        width="65"
                                        height="65"
                                        class="rounded-circle shadow-sm border border-2 border-light object-fit-cover">

                                @else

                                    <img src="https://via.placeholder.com/65x65?text=User"
                                        class="rounded-circle shadow-sm">

                                @endif

                            </td>

                            <td class="fw-bold text-dark">

                                {{ $item->nama }}

                            </td>

                            <td class="text-secondary">

                                {{ $item->username }}

                            </td>

                            <td>

                                @if($item->role == 'admin')

                                    <span class="badge rounded-pill bg-danger px-3 py-2">

                                        Admin

                                    </span>

                                @elseif($item->role == 'petugas')

                                    <span class="badge rounded-pill bg-primary px-3 py-2">

                                        Petugas

                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-success px-3 py-2">

                                        Peminjam

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('user.show', $item->id) }}"
                                    class="btn btn-sm btn-info rounded-pill px-3 shadow-sm">

                                    <i class="fas fa-eye"></i>

                                </a>

                                <a href="{{ route('user.edit', $item->id) }}"
                                    class="btn btn-sm btn-warning rounded-pill px-3 shadow-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('user.destroy', $item->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm"
                                        onclick="return confirm('Yakin hapus data?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5">

                                <i class="fas fa-users-slash fa-3x text-secondary mb-3"></i>

                                <p class="text-muted mb-0">

                                    Data user belum tersedia

                                </p>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
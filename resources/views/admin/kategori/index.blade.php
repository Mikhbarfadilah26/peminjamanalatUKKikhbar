@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                <i class="fas fa-layer-group me-2"></i>

                Data Kategori

            </h4>

            <a href="{{ route('kategori.create') }}"
                class="btn btn-warning fw-bold">

                <i class="fas fa-plus-circle me-1"></i>

                Tambah

            </a>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-secondary">

                        <tr>

                            <th width="70">No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td class="fw-bold">

                                {{ $item->nama_kategori }}

                            </td>

                            <td>

                                {{ $item->deskripsi }}

                            </td>

                            <td>

                                <a href="{{ route('kategori.show', $item->id) }}"
                                    class="btn btn-info btn-sm">

                                    <i class="fas fa-eye"></i>

                                </a>

                                <a href="{{ route('kategori.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('kategori.destroy', $item->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4"
                                class="text-center text-muted">

                                Data kategori belum tersedia

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
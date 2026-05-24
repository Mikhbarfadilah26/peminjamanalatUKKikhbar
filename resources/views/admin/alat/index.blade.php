@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                Data Alat
            </h5>

            <a href="{{ route('alat.create') }}"
                class="btn btn-warning fw-bold">

                <i class="fas fa-plus me-1"></i>
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

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-secondary">

                        <tr>

                            <th>No</th>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Nama Alat</th>
                            <th>Stok</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                @if($item->foto)

                                    <img src="{{ asset('foto/alat/' . $item->foto) }}"
                                        width="60"
                                        height="60"
                                        class="rounded shadow-sm">

                                @else

                                    <span class="text-muted">No Image</span>

                                @endif

                            </td>

                            <td>
                                {{ $item->kategori->nama_kategori ?? '-' }}
                            </td>

                            <td>
                                {{ $item->nama_alat }}
                            </td>

                            <td>
                                {{ $item->stok }}
                            </td>

                            <td>
                                {{ $item->kondisi }}
                            </td>

                            <td>

                                @if($item->status == 'tersedia')

                                    <span class="badge bg-success">Tersedia</span>

                                @elseif($item->status == 'dipinjam')

                                    <span class="badge bg-primary">Dipinjam</span>

                                @else

                                    <span class="badge bg-danger">Rusak</span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('alat.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>

                                <form action="{{ route('alat.destroy', $item->id) }}"
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

                            <td colspan="8"
                                class="text-center text-muted">

                                Data alat belum tersedia

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
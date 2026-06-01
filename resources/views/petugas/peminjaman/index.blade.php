@extends('layouts.apppetugas')

@section('content')

<style>

    .aksi-group{
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: nowrap;
    }

    .aksi-group form{
        margin: 0;
    }

    .aksi-btn{
        min-width: 75px;
        white-space: nowrap;
    }

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="bg-warning text-dark p-4 rounded shadow mb-4">

        <h4 class="mb-1">
            🟡 Approval Peminjaman
        </h4>

        <small>
            Data peminjaman yang menunggu persetujuan
        </small>

    </div>


    {{-- ALERT --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show">
    {{ session('error') }}
</div>
@endif


    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="thead-dark">

                        <tr>

                            <th>No</th>

                            <th>Peminjam</th>

                            <th>Alat</th>

                            <th>Jumlah</th>

                            <th>Tanggal</th>

                            <th>Status</th>

                            <th width="420">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($data as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>
                                {{ $item->user->nama }}
                            </td>


                            <td>
                                {{ $item->alat->nama_alat }}
                            </td>


                            <td>
                                {{ $item->jumlah }}
                            </td>


                            <td>
                                {{ $item->tanggal_pinjam }}
                            </td>


                            <td>

                                @if($item->status=='pending')

                                    <span class="badge badge-warning">
                                        PENDING
                                    </span>

                                @elseif($item->status=='approved')

                                    <span class="badge badge-success">
                                        APPROVED
                                    </span>

                                @elseif($item->status=='rejected')

                                    <span class="badge badge-danger">
                                        REJECTED
                                    </span>

                                @else

                                    <span class="badge badge-secondary">
                                        {{ strtoupper($item->status) }}
                                    </span>

                                @endif

                            </td>


                            <td>

                                <div class="aksi-group">

                                    {{-- APPROVE --}}
                                    @if($item->status=='pending')

                                    <form
                                        action="{{ route('petugas.peminjaman.approve',$item->id) }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            class="btn btn-success btn-sm aksi-btn">

                                            ✔ Approve

                                        </button>

                                    </form>



                                    {{-- REJECT --}}
                                    <form
                                        action="{{ route('petugas.peminjaman.reject',$item->id) }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            class="btn btn-danger btn-sm aksi-btn">

                                            ✖ Reject

                                        </button>

                                    </form>

                                    @endif




                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route('petugas.peminjaman.destroy',$item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin hapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="btn btn-dark btn-sm aksi-btn">

                                            🗑 Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                        @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center">

                                Tidak ada data

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

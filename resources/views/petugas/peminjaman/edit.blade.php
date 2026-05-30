
@extends('layouts.apppetugas')

@section('content')

<div class="container-fluid py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card border-0 shadow-lg rounded-4">

                {{-- HEADER --}}
                <div class="card-header bg-primary text-white py-4 rounded-top-4">

                    <h4 class="mb-1 fw-bold">

                        Approval Peminjaman

                    </h4>

                    <small>

                        Approve atau reject peminjaman

                    </small>

                </div>



                <div class="card-body p-5 text-center">

                    {{-- STATUS --}}
                    <div class="mb-4">

                        @if($data->status == 'menunggu')

                        <span class="badge bg-warning text-dark px-4 py-3">

                            Menunggu Persetujuan

                        </span>

                        @elseif($data->status == 'disetujui')

                        <span class="badge bg-success px-4 py-3">

                            Sudah Disetujui

                        </span>

                        @elseif($data->status == 'ditolak')

                        <span class="badge bg-danger px-4 py-3">

                            Ditolak

                        </span>

                        @endif

                    </div>



                    {{-- FORM --}}
                    <form action="{{ route('petugas.peminjaman.update',$data->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')


                        <div class="d-flex justify-content-center gap-3 flex-wrap">

                            {{-- APPROVE --}}
                            <button
                                type="submit"
                                name="status"
                                value="disetujui"
                                class="btn btn-success btn-lg px-4">

                                <i class="fas fa-check-circle me-2"></i>

                                Approve

                            </button>


                            {{-- REJECT --}}
                            <button
                                type="submit"
                                name="status"
                                value="ditolak"
                                class="btn btn-danger btn-lg px-4">

                                <i class="fas fa-times-circle me-2"></i>

                                Reject

                            </button>

                        </div>


                        {{-- KEMBALI --}}
                        <div class="mt-4">

                            <a href="{{ route('petugas.peminjaman') }}"
                               class="btn btn-secondary px-4">

                                <i class="fas fa-arrow-left me-2"></i>

                                Kembali

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>



<style>
    .card {
        border-radius: 24px;
    }

    .badge {
        font-size: 15px;
        border-radius: 12px;
        font-weight: 600;
    }

    .btn {
        border-radius: 12px;
        font-weight: 600;
    }
</style>

@endsection
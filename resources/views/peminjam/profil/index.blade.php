@extends('layouts.apppeminjam')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">

                {{-- HEADER --}}
                <div class="card-header text-white text-center"
                     style="background: linear-gradient(135deg,#0d6efd,#20c997);">

                    <h4 class="mb-0">👤 Profil Pengguna</h4>

                </div>

                <div class="card-body text-center">

                    {{-- ICON --}}
                    <div class="mb-3">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                             style="width:80px;height:80px;font-size:30px;">

                            {{ strtoupper(substr($user->name ?? 'U',0,1)) }}

                        </div>
                    </div>

                    {{-- DATA --}}
                    <h5 class="fw-bold mb-1">
                        {{ $user->name }}
                    </h5>

                    <p class="text-muted mb-3">
                        {{ $user->email }}
                    </p>

                    <hr>

                    <div class="text-start">

                        <p><strong>Nama :</strong> {{ $user->name }}</p>
                        <p><strong>Email :</strong> {{ $user->email }}</p>
                        <p><strong>Role :</strong> Peminjam</p>

                    </div>

                    <hr>

                    <a href="/peminjam/dashboard" class="btn btn-primary w-100">
                        Kembali ke Dashboard
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
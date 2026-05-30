@extends('layouts.apppeminjam')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">

                {{-- HEADER --}}
                <div class="card-header text-white text-center"
                    style="background: linear-gradient(135deg,#0d6efd,#20c997);">

                    <h4 class="mb-0">
                        👤 Profil Pengguna
                    </h4>

                </div>

                {{-- BODY --}}
                <div class="card-body text-center">

                    {{-- FOTO / ICON --}}
                    <div class="mb-4">

                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto"
                            style="
                                width: 90px;
                                height: 90px;
                                font-size: 34px;
                                font-weight: bold;
                            ">

                            {{ strtoupper(substr($user->nama ?? 'U',0,1)) }}

                        </div>

                    </div>

                    {{-- NAMA --}}
                    <h4 class="fw-bold mb-1">

                        {{ $user->nama }}

                    </h4>

                    {{-- ROLE --}}
                    <span class="badge bg-success px-3 py-2">

                        {{ strtoupper($user->role) }}

                    </span>

                    <hr>

                    {{-- DATA --}}
                    <div class="text-start mt-4">

                        <div class="mb-3">

                            <strong>
                                Nama Lengkap
                            </strong>

                            <div class="text-muted">

                                {{ $user->nama }}

                            </div>

                        </div>

                        <div class="mb-3">

                            <strong>
                                Username
                            </strong>

                            <div class="text-muted">

                                {{ $user->username }}

                            </div>

                        </div>

                        <div class="mb-3">

                            <strong>
                                Role
                            </strong>

                            <div class="text-muted">

                                {{ $user->role }}

                            </div>

                        </div>

                    </div>

                    <hr>

                    {{-- BUTTON --}}
                    <a href="/peminjam/dashboard"
                        class="btn btn-primary w-100 rounded-3">

                        ← Kembali ke Dashboard

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
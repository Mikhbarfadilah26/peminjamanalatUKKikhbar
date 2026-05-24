@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="card shadow border-0">

        <div class="card-header bg-info text-white">

            <h5 class="mb-0">
                Detail User
            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    @if($data->foto)

                        <img src="{{ asset('foto/user/' . $data->foto) }}"
                            class="img-fluid rounded shadow"
                            width="220">

                    @else

                        <img src="https://via.placeholder.com/220x220?text=No+Photo"
                            class="img-fluid rounded shadow">

                    @endif

                </div>

                <div class="col-md-8">

                    <table class="table table-bordered">

                        <tr>

                            <th width="200">
                                Nama
                            </th>

                            <td>
                                {{ $data->nama }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Username
                            </th>

                            <td>
                                {{ $data->username }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Role
                            </th>

                            <td>

                                <span class="badge bg-success">

                                    {{ $data->role }}

                                </span>

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Dibuat
                            </th>

                            <td>
                                {{ $data->created_at->format('d M Y H:i') }}
                            </td>

                        </tr>

                    </table>

                    <a href="{{ route('user.index') }}"
                        class="btn btn-secondary">

                        <i class="fas fa-arrow-left me-1"></i>

                        Kembali

                    </a>

                    <a href="{{ route('user.edit', $data->id) }}"
                        class="btn btn-warning">

                        <i class="fas fa-edit me-1"></i>

                        Edit

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
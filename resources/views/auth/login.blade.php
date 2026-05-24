<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Login | SEWA ALAT UKK
    </title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
            background: linear-gradient(135deg,#e0e7ff,#f8fafc);
            min-height: 100vh;
        }

        /* CARD LOGIN */
        .login-card{
            border-radius: 25px;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        /* ICON LOGIN */
        .login-icon{
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg,#facc15,#f59e0b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            color: white;
            font-size: 35px;
            box-shadow: 0 10px 30px rgba(245,158,11,.4);
        }

        /* INPUT */
        .form-control{
            height: 50px;
            border-radius: 12px;
        }

        .form-control:focus{
            box-shadow: 0 0 0 .2rem rgba(37,99,235,.2);
            border-color: #2563eb;
        }

        /* BUTTON LOGIN */
        .btn-login{
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
            border: none;
            height: 50px;
            border-radius: 12px;
            color: white;
            transition: .3s;
        }

        .btn-login:hover{
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37,99,235,.3);
            color: white;
        }

    </style>

</head>

<body class="d-flex flex-column">

    {{-- =========================
         NAVBAR
    ========================== --}}
    @include('layouts.landing.navbar')

    {{-- =========================
         LOGIN
    ========================== --}}
    <div class="container flex-grow-1">

        <div class="row justify-content-center align-items-center py-5">

            <div class="col-lg-5 col-md-7">

                <div class="card border-0 shadow-lg login-card">

                    <div class="card-body p-5">

                        {{-- ICON --}}
                        <div class="text-center mb-4">

                            <div class="login-icon mb-4">

                                <i class="fas fa-user-lock"></i>

                            </div>

                            <h2 class="fw-bold">

                                Login Sistem

                            </h2>

                            <p class="text-muted">

                                Silahkan login untuk masuk ke sistem
                                peminjaman alat UKK

                            </p>

                        </div>

                        {{-- ALERT --}}
                        @if(session('error'))

                            <div class="alert alert-danger border-0 shadow-sm">

                                <i class="fas fa-circle-exclamation me-2"></i>

                                {{ session('error') }}

                            </div>

                        @endif

                        {{-- FORM --}}
                        <form action="/login"
                            method="POST">

                            @csrf

                            {{-- USERNAME --}}
                            <div class="mb-3">

                                <label class="form-label fw-semibold">

                                    Username

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-white">

                                        <i class="fas fa-user text-primary"></i>

                                    </span>

                                    <input type="text"
                                        name="username"
                                        class="form-control"
                                        placeholder="Masukkan username"
                                        required>

                                </div>

                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Password

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-white">

                                        <i class="fas fa-lock text-primary"></i>

                                    </span>

                                    <input type="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Masukkan password"
                                        required>

                                </div>

                            </div>

                            {{-- BUTTON --}}
                            <button type="submit"
                                class="btn btn-login w-100 fw-bold">

                                <i class="fas fa-sign-in-alt me-2"></i>

                                Login Sekarang

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- =========================
         FOOTER
    ========================== --}}
    @include('layouts.landing.footer')

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
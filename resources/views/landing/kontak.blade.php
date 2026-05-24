<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Kontak Kami</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body {

            background: #f8fafc;

        }

        .hero-kontak {

            background: linear-gradient(135deg, #0f172a, #1e3a8a);

            color: white;

            padding: 80px 0;

        }

        .contact-card {

            border: none;

            border-radius: 20px;

            overflow: hidden;

            transition: 0.3s;

        }

        .contact-card:hover {

            transform: translateY(-5px);

        }

        .icon-box {

            width: 70px;

            height: 70px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 28px;

            margin: auto;

        }

        .form-control {

            border-radius: 12px;

            padding: 12px;

        }

        .btn-kirim {

            border-radius: 12px;

            padding: 12px;

            font-weight: bold;

        }

    </style>

</head>

<body>

    {{-- NAVBAR --}}
    @include('layouts.landing.navbar')

    {{-- HERO --}}
    <section class="hero-kontak">

        <div class="container text-center">

            <h1 class="fw-bold mb-3">

                Hubungi Kami

            </h1>

            <p class="lead">

                Silahkan hubungi admin laboratorium jika ada
                kendala peminjaman alat UKK.

            </p>

        </div>

    </section>

    {{-- KONTAK --}}
    <section class="py-5">

        <div class="container">

            <div class="row g-4">

                {{-- INFO --}}
                <div class="col-lg-5">

                    <div class="card shadow contact-card h-100">

                        <div class="card-body p-5">

                            <h3 class="fw-bold mb-4">

                                Informasi Kontak

                            </h3>

                            {{-- EMAIL --}}
                            <div class="text-center mb-4">

                                <div class="icon-box bg-danger text-white mb-3">

                                    <i class="fas fa-envelope"></i>

                                </div>

                                <h5 class="fw-bold">
                                    Email
                                </h5>

                                <p class="text-muted mb-0">
                                    sewaalat@smk.sch.id
                                </p>

                            </div>

                            {{-- TELEPON --}}
                            <div class="text-center mb-4">

                                <div class="icon-box bg-success text-white mb-3">

                                    <i class="fas fa-phone"></i>

                                </div>

                                <h5 class="fw-bold">
                                    Telepon
                                </h5>

                                <p class="text-muted mb-0">
                                    0821-xxxx-xxxx
                                </p>

                            </div>

                            {{-- LOKASI --}}
                            <div class="text-center">

                                <div class="icon-box bg-primary text-white mb-3">

                                    <i class="fas fa-map-marker-alt"></i>

                                </div>

                                <h5 class="fw-bold">
                                    Lokasi
                                </h5>

                                <p class="text-muted mb-0">

                                    Laboratorium Rekayasa
                                    Perangkat Lunak

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- FORM --}}
                <div class="col-lg-7">

                    <div class="card shadow contact-card">

                        <div class="card-body p-5">

                            <h3 class="fw-bold mb-4">

                                Kirim Pesan

                            </h3>

                            <form action="#"
                                method="POST">

                                @csrf

                                {{-- NAMA --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">

                                        Nama Lengkap

                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        placeholder="Masukkan nama lengkap">

                                </div>

                                {{-- EMAIL --}}
                                <div class="mb-3">

                                    <label class="form-label fw-semibold">

                                        Email

                                    </label>

                                    <input type="email"
                                        class="form-control"
                                        placeholder="Masukkan email">

                                </div>

                                {{-- PESAN --}}
                                <div class="mb-4">

                                    <label class="form-label fw-semibold">

                                        Pesan

                                    </label>

                                    <textarea class="form-control"
                                        rows="5"
                                        placeholder="Tulis pesan anda"></textarea>

                                </div>

                                {{-- BUTTON --}}
                                <button type="submit"
                                    class="btn btn-primary w-100 btn-kirim">

                                    <i class="fas fa-paper-plane me-2"></i>

                                    Kirim Pesan

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- FOOTER --}}
    @include('layouts.landing.footer')

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
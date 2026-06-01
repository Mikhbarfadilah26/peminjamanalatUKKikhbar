<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Aplikasi Peminjaman Alat
    </title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            background: #f5f7fb;
        }

        /* =========================
           HERO
        ========================== */
        .hero {
            background-image: url("{{ asset('foto/peminjaman.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .hero-overlay {
            background: rgba(0, 0, 0, 0.65);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        /* =========================
           BUTTON HERO
        ========================== */
        .btn-hero {
            background: linear-gradient(135deg, #facc15, #f59e0b);
            border: none;
            color: white;
            transition: .3s;
            border-radius: 12px;
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(250, 204, 21, .4);
            color: white;
        }

        /* =========================
           CARD ALAT
        ========================== */
        .alat-card {
            border-radius: 20px;
            overflow: hidden;
            transition: .3s;
        }

        .alat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, .1);
        }

        .alat-img {
            height: 220px;
            object-fit: cover;
        }

        /* =========================
           ALUR TIMELINE DESIGN
        ========================== */
        .alur-card {
            border-radius: 24px;
            background: #ffffff;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }
        
        .alur-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.1) !important;
        }

        .step-badge {
            width: 45px;
            height: 45px;
            background: #2563eb;
            color: white;
            font-weight: 700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
            font-size: 18px;
        }

        .alur-icon-wrapper {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            font-size: 28px;
            transition: .3s;
        }

        /* Connector Line for Desktop Layout */
        @media (min-width: 992px) {
            .alur-row {
                position: relative;
            }
            .alur-row::before {
                content: '';
                position: absolute;
                top: 25%;
                left: 10%;
                width: 80%;
                height: 3px;
                background: linear-gradient(90deg, #2563eb, #16a34a, #dc2626);
                z-index: 1;
                opacity: 0.2;
            }
        }

        /* =========================
           FITUR
        ========================== */
        .fitur-card {
            border-radius: 20px;
            transition: .3s;
        }

        .fitur-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .fitur-icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 35px;
            color: white;
        }

        .bg-biru {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
        }

        .bg-hijau {
            background: linear-gradient(135deg, #16a34a, #15803d);
        }

        .bg-merah {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
        }

        /* =========================
           SECTION TITLE
        ========================== */
        .section-title {
            font-weight: bold;
            font-size: 38px;
        }
    </style>

</head>

<body>

    {{-- =========================
         NAVBAR
    ========================== --}}
    @include('layouts.landing.navbar')


    {{-- =========================
         HERO
    ========================== --}}
    <style>
        /* =========================
           HERO SLIDE EXTRA STYLES
        ========================== */
        .hero {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("{{ asset('foto/peminjaman.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            animation: slideBg 18s infinite;
            z-index: 1;
        }

        .hero-overlay {
            position: relative;
            z-index: 2;
            background: rgba(0, 0, 0, 0.65);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        @keyframes slideBg {
            0% {
                background-image: url("{{ asset('foto/peminjaman.jpg') }}");
            }
            50% {
                background-image: url("{{ asset('foto/alat2.jpg') }}");
            }
            100% {
                background-image: url("{{ asset('foto/peminjaman.jpg') }}");
            }
        }
    </style>

    <section class="hero text-white">

        <div class="hero-overlay">

            <div class="container">

                <div class="row align-items-center min-vh-100">

                    <div class="col-lg-7">

                        <h1 class="fw-bold display-3">
                            Sistem Peminjaman Alat 
                        </h1>

                        <p class="lead mt-4">
                            Aplikasi berbasis Laravel 13 untuk membantu proses peminjaman alat,
                            pengembalian alat, monitoring transaksi, serta laporan alat secara modern
                            dan profesional.
                        </p>

                        <div class="mt-4">
                            <a href="/login"
                                class="btn btn-hero btn-lg px-4 py-3 fw-bold shadow">
                                <i class="fas fa-box-open me-2"></i>
                                Mulai Sekarang
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- =========================
         ETALASE ALAT
    ========================== --}}
    <section class="py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">
                    Daftar Alat
                </h2>
                <p class="text-muted">
                    Alat terbaru yang tersedia untuk dipinjam
                </p>
            </div>

            <div class="row g-4">

                @php
                $alat = \App\Models\ModelAlat::latest()
                ->take(8)
                ->get();
                @endphp

                @forelse($alat as $item)

                <div class="col-lg-3 col-md-6">

                    <div class="card border-0 shadow-sm alat-card h-100">

                        {{-- FOTO --}}
                        <img src="{{ asset('foto/alat/'.$item->foto) }}"
                            class="card-img-top alat-img"
                            alt="foto alat">

                        {{-- BODY --}}
                        <div class="card-body text-center">
                            <h5 class="fw-bold">
                                {{ $item->nama_alat }}
                            </h5>
                            <p class="text-muted small mb-2">
                                Kondisi : {{ $item->kondisi }}
                            </p>
                        </div>

                    </div>

                </div>

                @empty

                <div class="col-12">
                    <div class="alert alert-warning text-center shadow-sm">
                        Belum ada data alat
                    </div>
                </div>

                @endforelse

            </div>

        </div>

    </section>

    {{-- =========================
         NEW SECTION: ALUR PEMINJAMAN
    ========================== --}}
    <section class="py-5 bg-light" style="border-top: 1px solid #eef2f6;">
        <div class="container">
            
            <div class="text-center mb-5">
                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Workflow</span>
                <h2 class="section-title">Alur Peminjaman</h2>
                <p class="text-muted">Prosedur mudah mengajukan sarana alat praktik laboratorium sekolah</p>
            </div>

            <div class="row g-4 alur-row">
                
                {{-- LANGKAH 1 --}}
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm alur-card h-100 text-center p-4">
                        <div class="step-badge">1</div>
                        <div class="alur-icon-wrapper bg-biru text-white">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <h5 class="fw-bold text-dark mt-2">Login Akun</h5>
                        <p class="text-muted small mb-0">Masuk ke sistem menggunakan akun hak akses siswa/peminjam yang valid.</p>
                    </div>
                </div>

                {{-- LANGKAH 2 --}}
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm alur-card h-100 text-center p-4">
                        <div class="step-badge" style="background:#f59e0b; box-shadow: 0 5px 15px rgba(245,158,11,0.3)">2</div>
                        <div class="alur-icon-wrapper text-white" style="background: linear-gradient(135deg, #facc15, #f59e0b)">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <h5 class="fw-bold text-dark mt-2">Pilih & Ajukan</h5>
                        <p class="text-muted small mb-0">Cari alat di katalog, tentukan kuantitas unit, dan kirim form peminjaman.</p>
                    </div>
                </div>

                {{-- LANGKAH 3 --}}
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm alur-card h-100 text-center p-4">
                        <div class="step-badge" style="background:#16a34a; box-shadow: 0 5px 15px rgba(22,163,74,0.3)">3</div>
                        <div class="alur-icon-wrapper bg-hijau text-white">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <h5 class="fw-bold text-dark mt-2">Verifikasi Petugas</h5>
                        <p class="text-muted small mb-0">Petugas memeriksa ketersediaan stok fisik barang dan menyetujui pengajuan.</p>
                    </div>
                </div>

                {{-- LANGKAH 4 --}}
                <div class="col-lg-3 col-md-6">
                    <div class="card border-0 shadow-sm alur-card h-100 text-center p-4">
                        <div class="step-badge" style="background:#dc2626; box-shadow: 0 5px 15px rgba(220,38,38,0.3)">4</div>
                        <div class="alur-icon-wrapper bg-merah text-white">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h5 class="fw-bold text-dark mt-2">Ambil & Kembalikan</h5>
                        <p class="text-muted small mb-0">Ambil sarana alat di lab, gunakan untuk praktik, lalu kembalikan tepat waktu.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- =========================
         FITUR
    ========================== --}}
    <section class="py-5 bg-white">

        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">
                    Fitur Utama
                </h2>
                <p class="text-muted">
                    Fitur aplikasi sesuai kebutuhan UKK RPL
                </p>
            </div>

            <div class="row g-4">

                {{-- DATA ALAT --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm fitur-card h-100">
                        <div class="card-body text-center p-5">
                            <div class="fitur-icon bg-biru mb-4">
                                <i class="fas fa-tools"></i>
                            </div>
                            <h5 class="fw-bold">
                                Data Alat
                            </h5>
                            <p class="text-muted">
                                Mengelola data alat, kategori, dan stok alat secara realtime.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- PEMINJAMAN --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm fitur-card h-100">
                        <div class="card-body text-center p-5">
                            <div class="fitur-icon bg-hijau mb-4">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <h5 class="fw-bold">
                                Peminjaman
                            </h5>
                            <p class="text-muted">
                                Mengelola transaksi peminjaman, approval, dan pengembalian alat.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- LAPORAN --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm fitur-card h-100">
                        <div class="card-body text-center p-5">
                            <div class="fitur-icon bg-merah mb-4">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h5 class="fw-bold">
                                Laporan
                            </h5>
                            <p class="text-muted">
                                Cetak laporan peminjaman dan pengembalian alat otomatis.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    

    {{-- =========================
         FOOTER
    ========================== --}}
    @include('layouts.landing.footer')

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
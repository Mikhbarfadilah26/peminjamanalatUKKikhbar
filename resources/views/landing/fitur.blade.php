<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Fitur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    @include('layouts.landing.navbar')

    <section class="py-5">

        <div class="container">

            <h2 class="fw-bold text-center mb-5">
                Fitur Sistem
            </h2>

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="card shadow border-0 h-100">

                        <div class="card-body text-center">

                            <i class="fas fa-box fa-3x text-primary mb-3"></i>

                            <h5 class="fw-bold">
                                Data Alat
                            </h5>

                            <p class="text-muted">
                                Kelola seluruh data alat UKK.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card shadow border-0 h-100">

                        <div class="card-body text-center">

                            <i class="fas fa-handshake fa-3x text-success mb-3"></i>

                            <h5 class="fw-bold">
                                Peminjaman
                            </h5>

                            <p class="text-muted">
                                Proses peminjaman alat lebih cepat.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card shadow border-0 h-100">

                        <div class="card-body text-center">

                            <i class="fas fa-chart-bar fa-3x text-danger mb-3"></i>

                            <h5 class="fw-bold">
                                Laporan
                            </h5>

                            <p class="text-muted">
                                Cetak laporan otomatis.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @include('layouts.landing.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
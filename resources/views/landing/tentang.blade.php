<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Tentang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    @include('layouts.landing.navbar')

    <section class="py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="fw-bold">
                    Tentang Aplikasi
                </h2>

            </div>

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="card shadow border-0">

                        <div class="card-body p-5">

                            <p class="text-muted fs-5">

                                Sistem peminjaman alat UKK dibuat
                                untuk membantu pengelolaan alat praktik
                                di laboratorium sekolah.

                            </p>

                            <p class="text-muted fs-5">

                                Dibangun menggunakan Laravel 13
                                dan Bootstrap 5 agar modern,
                                cepat, dan responsif.

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
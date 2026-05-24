<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Petugas Dashboard</title>

    <link rel="stylesheet"
        href="{{ asset('dist/css/adminlte.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('layouts.petugas.navbar')

        @include('layouts.petugas.sidebar')

        <div class="content-wrapper">

            <section class="content pt-4">

                <div class="container-fluid">

                    @yield('content')

                </div>

            </section>

        </div>

        @include('layouts.petugas.footer')

    </div>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    {{-- ADMIN LTE --}}
    <link rel="stylesheet"
        href="{{ asset('dist/css/adminlte.min.css') }}">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        {{-- NAVBAR --}}
        @include('layouts.admin.navbar')

        {{-- SIDEBAR --}}
        @include('layouts.admin.sidebar')

        {{-- CONTENT --}}
        <div class="content-wrapper">

            <section class="content pt-4">

                <div class="container-fluid">

                    @yield('content')

                </div>

            </section>

        </div>

        {{-- FOOTER --}}
        @include('layouts.admin.footer')

    </div>

    {{-- JS --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>

</html>
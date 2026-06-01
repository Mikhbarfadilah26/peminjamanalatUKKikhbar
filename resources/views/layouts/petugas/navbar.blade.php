<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    {{-- LEFT --}}
    <ul class="navbar-nav">

        <li class="nav-item">

            <a class="nav-link"
                data-widget="pushmenu"
                href="#"
                role="button">

                <i class="fas fa-bars"></i>

            </a>

        </li>

    </ul>

    {{-- RUNNING TEXT --}}
    <div class="mx-auto d-none d-md-block" style="width:60%; overflow:hidden;">

        <marquee
            behavior="scroll"
            direction="left"
            scrollamount="5"
            style="
                color:#2563eb;
                font-weight:600;
                font-size:15px;
            ">

            🔧 Selamat Datang Petugas Sistem Peminjaman Alat • Verifikasi Peminjaman Dengan Teliti • Pastikan Stok Alat Sesuai • Lakukan Pengembalian Tepat Waktu • Berikan Pelayanan Terbaik Kepada Peminjam • UKK RPL 2025/2026

        </marquee>

    </div>

{{-- RIGHT --}}
<ul class="navbar-nav ml-auto align-items-center">

    {{-- LOGO PETUGAS --}}
<li class="nav-item mr-3">

    <span class="badge badge-success p-2">

        <i class="fas fa-user-shield mr-1"></i>

        PETUGAS

    </span>

</li>
    {{-- LOGOUT --}}
    <li class="nav-item">

        <form action="/logout"
            method="POST">

            @csrf

            <button class="btn btn-danger btn-sm">

                <i class="fas fa-sign-out-alt mr-1"></i>

                Logout

            </button>

        </form>

    </li>

</ul>
</nav>
<style>
    /* =========================
       NAVBAR
    ========================= */

    .custom-navbar {
        height: 65px;
        background: linear-gradient(135deg, #ffffff, #f8fafc);
        border-bottom: 1px solid #e5e7eb;
        z-index: 1030;
    }

    /* =========================
       TOGGLE
    ========================= */

    .menu-toggle {
        font-size: 20px;
        color: #1e293b !important;
    }

    /* =========================
       RUNNING TEXT
    ========================= */

    .running-container {
        flex: 1;
        overflow: hidden;
        white-space: nowrap;
        position: relative;
        height: 35px;
        display: flex;
        align-items: center;
    }

    .running-text {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 25s linear infinite;
        font-weight: 600;
        color: #1e3a8a;
        font-size: 14px;
    }

    @keyframes marquee {
        from {
            transform: translateX(0%);
        }

        to {
            transform: translateX(-100%);
        }
    }

    /* =========================
       LOGOUT
    ========================= */

    .logout-btn {
        border-radius: 10px;
        padding: 6px 14px;
        font-weight: 600;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width:768px) {

        .running-text {
            font-size: 12px;
        }

        .badge {
            display: none;
        }
    }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm border-0 custom-navbar">

    {{-- TOMBOL SIDEBAR --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link menu-toggle"
                data-widget="pushmenu"
                href="#"
                role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    {{-- RUNNING TEXT --}}
    <div class="running-container mx-3">

        <div class="running-text">

            <i class="fas fa-bullhorn text-warning"></i>

            Selamat datang di Sistem Peminjaman Alat UKK •

            Pastikan alat yang dipinjam digunakan dengan baik •

            Kembalikan alat tepat waktu •

            Jaga kebersihan dan kondisi alat •

            Terima kasih telah menggunakan layanan peminjaman alat •

        </div>

    </div>

    {{-- MENU KANAN --}}
    <ul class="navbar-nav ml-auto align-items-center">

        <li class="nav-item mr-3">

            <span class="badge badge-success px-3 py-2">
                <i class="fas fa-user mr-1"></i>
                Peminjam
            </span>

        </li>

        <li class="nav-item">

            <form action="/logout" method="POST">

                @csrf

                <button class="btn btn-danger btn-sm logout-btn">

                    <i class="fas fa-sign-out-alt mr-1"></i>
                    Logout

                </button>

            </form>

        </li>

    </ul>

</nav>
<aside class="main-sidebar sidebar-dark-success elevation-4 fixed-sidebar">

    {{-- LOGO --}}
    <a href="{{ route('petugas.dashboard') }}"
        class="brand-link text-center d-flex align-items-center justify-content-center"
        style="height: 70px;">

        {{-- ICON LOGO --}}
        <div class="d-flex align-items-center justify-content-center mr-2"
            style="
                width: 42px;
                height: 42px;
                border-radius: 12px;
                background: linear-gradient(135deg, #28a745, #20c997);
                box-shadow: 0 4px 10px rgba(0,0,0,0.25);
            ">

            <i class="fas fa-user-shield text-white"
                style="font-size: 18px;"></i>

        </div>

        {{-- TEXT LOGO --}}
        <div class="text-left">

            <span class="brand-text font-weight-bold text-white d-block"
                style="
                    font-size: 16px;
                    letter-spacing: 1px;
                    line-height: 1.1;
                ">

                PETUGAS UKK

            </span>

            <small style="
                    color: rgba(255,255,255,0.7);
                    font-size: 11px;
                    letter-spacing: 1px;
                ">

                PEMINJAMAN ALAT

            </small>

        </div>

    </a>


    <div class="sidebar">

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column">


                {{-- DASHBOARD --}}
                <li class="nav-item">

                    <a href="{{ route('petugas.dashboard') }}"
                        class="nav-link {{ request()->is('petugas/dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home"></i>

                        <p>Dashboard</p>

                    </a>

                </li>


                {{-- ALAT --}}
                <li class="nav-item">

                    <a href="{{ route('petugas.alat') }}"
                        class="nav-link {{ request()->is('petugas/alat*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tools"></i>

                        <p>Data Alat</p>

                    </a>

                </li>


                {{-- APPROVAL --}}
                <li class="nav-item">

                    <a href="{{ route('petugas.peminjaman') }}"
                        class="nav-link {{ request()->is('petugas/peminjaman*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-check-circle"></i>

                        <p>Approval Peminjaman</p>

                    </a>

                </li>


                {{-- VERIFIKASI --}}
                <li class="nav-item">

                    <a href="{{ route('petugas.pengembalian') }}"
                        class="nav-link {{ request()->is('petugas/pengembalian*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-undo-alt"></i>

                        <p>Verifikasi Pengembalian</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>



{{-- STYLE SIDEBAR FIXED --}}
<style>

    /* SIDEBAR TETAP */
    .fixed-sidebar{
        position: fixed !important;
        top: 0;
        left: 0;
        height: 100vh;
        width: 250px;
        overflow: hidden;
        z-index: 999;
    }

    /* BAGIAN MENU YANG BISA DI SCROLL */
    .fixed-sidebar .sidebar{
        height: calc(100vh - 70px);
        overflow-y: auto;
        overflow-x: hidden;
    }

    /* SCROLLBAR */
    .fixed-sidebar .sidebar::-webkit-scrollbar{
        width: 6px;
    }

    .fixed-sidebar .sidebar::-webkit-scrollbar-thumb{
        background: rgba(255,255,255,0.2);
        border-radius: 10px;
    }

    /* AGAR CONTENT TIDAK KETIMPA SIDEBAR */
    .content-wrapper,
    .main-footer,
    .main-header{
        margin-left: 250px !important;
    }

</style>
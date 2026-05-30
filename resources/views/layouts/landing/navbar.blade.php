<style>
    /* =========================================
       NAVBAR
    ========================================= */

    .custom-navbar {

        background:
            linear-gradient(135deg,
                #0f172a,
                #1e3a8a);

        padding-top: 8px;
        padding-bottom: 8px;

        min-height: 70px;

        position: relative;

        z-index: 999;
    }



    /* =========================================
       BRAND
    ========================================= */

    .navbar-brand {

        display: flex;
        align-items: center;

        color: white !important;

        font-weight: 700;

    }



    /* =========================================
       RUNNING TEXT
    ========================================= */

    .running-text {

        width: 210px;

        overflow: hidden;

        white-space: nowrap;

        position: relative;

    }


    .running-text span {

        display: inline-block;

        padding-left: 100%;

        animation:
            runningText 12s linear infinite;

        color: white;

        font-size: 14px;

        font-weight: 700;

    }


    @keyframes runningText {

        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }

    }



    /* =========================================
       NAV MENU
    ========================================= */

    .navbar-nav {

        gap: 6px;

    }


    .navbar .nav-link {

        position: relative;

        color:
            rgba(255, 255, 255, .88) !important;

        padding:
            10px 16px;

        border-radius: 14px;

        font-size: 14px;

        font-weight: 600;

        transition: .25s;

    }



    /* hover */

    .navbar .nav-link:hover {

        background:
            rgba(255, 255, 255, .10);

        color:
            white !important;

    }



    /* active */

    .navbar .nav-link.active {

        background:
            rgba(255, 255, 255, .15);

        color:
            white !important;

    }



    /* =========================================
       SEARCH BOX
    ========================================= */

    .search-box {

        position: relative;

        margin-left: 18px;

    }


    .search-box input {

        width: 240px;

        height: 44px;

        border: none;

        outline: none;

        border-radius: 14px;

        background:
            rgba(255, 255, 255, .12);

        backdrop-filter: blur(10px);

        padding:
            0 16px 0 45px;

        color: white;

        font-size: 14px;

        transition: .25s;

    }


    .search-box input::placeholder {

        color:
            rgba(255, 255, 255, .65);

    }


    .search-box input:focus {

        background:
            rgba(255, 255, 255, .18);

        box-shadow:
            0 0 0 3px rgba(255, 255, 255, .12);

    }


    .search-box i {

        position: absolute;

        top: 50%;
        left: 16px;

        transform: translateY(-50%);

        color:
            rgba(255, 255, 255, .7);

        font-size: 14px;

    }



    /* =========================================
       DROPDOWN BUTTON
    ========================================= */

    .dropdown-toggle::after {

        margin-left: 8px;

        vertical-align: middle;

    }



    /* =========================================
       MEGA MENU
    ========================================= */

    .mega-dropdown {

        width: 580px;

        border: none;

        border-radius: 24px;

        padding: 0;

        overflow: hidden;

        margin-top: 18px;

        left: 50% !important;

        transform: translateX(-50%);

        background: white;

        box-shadow:
            0 20px 60px rgba(0, 0, 0, .18);

        animation:
            dropdownFade .25s ease;

    }



    /* panah atas */

    .mega-dropdown::before {

        content: '';

        position: absolute;

        top: -10px;

        left: 50%;

        transform:
            translateX(-50%) rotate(45deg);

        width: 22px;
        height: 22px;

        background: white;

    }



    /* dropdown content */

    .dropdown-wrapper {

        padding: 28px;

    }


    .dropdown-title {

        color: #7c3aed;

        font-weight: 700;

        font-size: 15px;

        margin-bottom: 25px;

    }



    /* item */

    .mega-item {

        display: flex;

        align-items: flex-start;

        gap: 18px;

        padding: 16px;

        border-radius: 18px;

        text-decoration: none;

        transition: .25s;

        margin-bottom: 10px;

    }


    .mega-item:hover {

        background:
            rgba(124, 58, 237, .06);

        transform:
            translateY(-2px);

    }



    /* icon */

    .mega-icon {

        width: 52px;
        height: 52px;

        border-radius: 16px;

        display: flex;
        align-items: center;
        justify-content: center;

        background:
            rgba(124, 58, 237, .12);

        color:
            #7c3aed;

        font-size: 20px;

    }



    /* title */

    .mega-item h5 {

        margin: 0 0 6px;

        color: #111827;

        font-size: 17px;

        font-weight: 700;

    }



    /* desc */

    .mega-item p {

        margin: 0;

        color: #6b7280;

        font-size: 15px;

        line-height: 1.5;

    }



    /* =========================================
       LOGIN BUTTON
    ========================================= */

    .btn-login {

        background:
            #facc15;

        color:
            #111827;

        border-radius:
            12px;

        padding:
            9px 18px;

        font-size:
            13px;

        font-weight: 700;

        transition: .25s;

    }


    .btn-login:hover {

        background:
            #fde047;

        transform:
            translateY(-1px);

    }



    /* =========================================
       ANIMATION
    ========================================= */

    @keyframes dropdownFade {

        from {

            opacity: 0;

            transform:
                translateX(-50%) translateY(10px);

        }

        to {

            opacity: 1;

            transform:
                translateX(-50%) translateY(0);

        }

    }



    /* =========================================
       MOBILE
    ========================================= */

    @media(max-width:768px) {

        .mega-dropdown {

            width: 100%;

            left: 0 !important;

            transform: none !important;

            margin-top: 10px;

        }


        .mega-dropdown::before {

            display: none;

        }


        .running-text {

            width: 150px;

        }


        .search-box {

            margin:
                15px 0;

            width: 100%;

        }


        .search-box input {

            width: 100%;

        }


        .btn-login {

            width: 100%;

            margin-top: 10px;

        }

    }
</style>





<nav
    class="navbar navbar-expand-lg navbar-dark shadow-sm custom-navbar">

    <div class="container">




        <!-- BRAND -->
        <a
            class="navbar-brand"
            href="/">

            <i
                class="fas fa-tools text-warning me-2"
                style="font-size:22px;">
            </i>


            <div class="running-text">

                <span>

                    APLIKASI PEMINJAMAN ALAT •
                    LARAVEL 13 • 2025/2026

                </span>

            </div>

        </a>





        <!-- TOGGLER -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>





        <div
            class="collapse navbar-collapse"
            id="navbarNav">

            <ul
                class="navbar-nav ms-auto align-items-lg-center">



                <!-- HOME -->
                <li class="nav-item">

                    <a
                        class="nav-link play-sound {{ request()->is('/') ? 'active' : '' }}"
                        href="/">

                        <i class="fas fa-home me-1"></i>

                        Home

                    </a>

                </li>



                <!-- FITUR DROPDOWN -->
                <li class="nav-item dropdown position-static">

                    <a class="nav-link dropdown-toggle play-sound {{ request()->is('fitur*') ? 'active' : '' }}"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fas fa-layer-group me-1"></i>
                        Fitur

                    </a>

                    <!-- MEGA MENU -->
                    <div class="dropdown-menu mega-dropdown">

                        <div class="dropdown-wrapper">

                            <div class="dropdown-title">
                                Solutions
                            </div>

                            <!-- ITEM 1 -->
                            <div class="mega-item">

                                <div class="mega-icon">
                                    <i class="fas fa-users"></i>
                                </div>

                                <div>
                                    <h5>Sistem Peminjaman</h5>

                                    <p>
                                        Kelola peminjaman alat dengan cepat dan modern
                                    </p>
                                </div>

                            </div>

                            <!-- ITEM 2 -->
                            <div class="mega-item">

                                <div class="mega-icon">
                                    <i class="fas fa-search"></i>
                                </div>

                                <div>
                                    <h5>Monitoring Alat</h5>

                                    <p>
                                        Pantau status alat dan siswa yang meminjam
                                    </p>
                                </div>

                            </div>

                            <!-- ITEM 3 -->
                            <div class="mega-item">

                                <div class="mega-icon">
                                    <i class="fas fa-chart-bar"></i>
                                </div>

                                <div>
                                    <h5>Laporan Otomatis</h5>

                                    <p>
                                        Cetak laporan peminjaman dengan mudah
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </li>


                <!-- TENTANG -->
                <li class="nav-item">

                    <a
                        class="nav-link play-sound {{ request()->is('tentang') ? 'active' : '' }}"
                        href="/tentang">

                        <i class="fas fa-info-circle me-1"></i>

                        Tentang

                    </a>

                </li>





                <!-- KONTAK -->
                <li class="nav-item">

                    <a
                        class="nav-link play-sound {{ request()->is('kontak') ? 'active' : '' }}"
                        href="/kontak">

                        <i class="fas fa-phone-alt me-1"></i>

                        Kontak

                    </a>

                </li>





                <!-- SEARCH -->
                <li class="nav-item">

                    <form class="search-box">

                        <i class="fas fa-search"></i>

                        <input
                            type="text"
                            placeholder="Cari sesuatu...">

                    </form>

                </li>





                <!-- LOGIN -->
                <li class="nav-item ms-lg-2">

                    <a
                        href="/login"
                        class="btn btn-login play-sound">

                        <i class="fas fa-sign-in-alt me-2"></i>

                        Login

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>





<!-- AUDIO -->
<audio id="navbarSound" preload="auto">

    <source
        src="{{ asset('audio/klik.mp3') }}"
        type="audio/mpeg">

</audio>





<!-- SOUND SCRIPT -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const audio =
            document.getElementById('navbarSound');

        const buttons =
            document.querySelectorAll('.play-sound');

        buttons.forEach(button => {

            button.addEventListener('click', function() {

                audio.currentTime = 0;

                audio.play();

            });

        });

    });
</script>
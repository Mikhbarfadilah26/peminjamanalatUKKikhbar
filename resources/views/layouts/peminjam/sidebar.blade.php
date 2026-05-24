<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- LOGO --}}
    <a href="{{ route('peminjam.dashboard') }}"
        class="brand-link text-center">

        <span class="brand-text font-weight-bold">

            PEMINJAM UKK

        </span>

    </a>



    <div class="sidebar">

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column">



                {{-- DASHBOARD --}}
                <li class="nav-item">

                    <a href="{{ route('peminjam.dashboard') }}"
                        class="nav-link {{ request()->is('peminjam/dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home"></i>

                        <p>

                            Dashboard

                        </p>

                    </a>

                </li>



                {{-- DAFTAR ALAT --}}
                <li class="nav-item">

                    <a href="{{ route('peminjam.alat') }}"
                        class="nav-link {{ request()->is('peminjam/alat*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tools"></i>

                        <p>

                            Daftar Alat

                        </p>

                    </a>

                </li>



                {{-- STATUS PEMINJAMAN --}}
                <li class="nav-item">

                    <a href="{{ route('peminjam.status') }}"
                        class="nav-link {{ request()->is('peminjam/status*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-clipboard-list"></i>

                        <p>

                            Status Peminjaman

                        </p>

                    </a>

                </li>



                {{-- PENGEMBALIAN --}}
                <li class="nav-item">

                    <a href="{{ route('peminjam.pengembalian') }}"
                        class="nav-link {{ request()->is('peminjam/pengembalian*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-undo"></i>

                        <p>

                            Pengembalian

                        </p>

                    </a>

                </li>



                {{-- PROFIL --}}
                <li class="nav-item">

                    <a href="{{ route('peminjam.profil') }}"
                        class="nav-link {{ request()->is('peminjam/profil*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-user"></i>

                        <p>

                            Profil Saya

                        </p>

                    </a>

                </li>



      



            </ul>

        </nav>

    </div>

</aside>
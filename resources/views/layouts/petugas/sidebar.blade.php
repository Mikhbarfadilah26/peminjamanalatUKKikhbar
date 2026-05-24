<aside class="main-sidebar sidebar-dark-success elevation-4">

    <a href="{{ route('petugas.dashboard') }}"
        class="brand-link text-center">

        <span class="brand-text font-weight-bold">

            PETUGAS UKK

        </span>

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
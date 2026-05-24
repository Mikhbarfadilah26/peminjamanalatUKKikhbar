<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('admin.dashboard') }}"
        class="brand-link text-center">

        <span class="brand-text font-weight-bold">

           DASHBOARD ADMIN 

        </span>

    </a>


    <div class="sidebar">

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column">

                {{-- DASHBOARD --}}
                <li class="nav-item">

                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home"></i>

                        <p>Dashboard</p>

                    </a>

                </li>


                {{-- USER --}}
                <li class="nav-item">

                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-users"></i>

                        <p>User</p>

                    </a>

                </li>


                {{-- KATEGORI --}}
                <li class="nav-item">

                    <a href="{{ route('kategori.index') }}"
                        class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-list"></i>

                        <p>Kategori</p>

                    </a>

                </li>


                {{-- ALAT --}}
                <li class="nav-item">

                    <a href="{{ route('alat.index') }}"
                        class="nav-link {{ request()->is('admin/alat*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tools"></i>

                        <p>Data Alat</p>

                    </a>

                </li>


                {{-- PEMINJAMAN --}}
                <li class="nav-item">

                    <a href="{{ route('admin.peminjaman') }}"
                        class="nav-link {{ request()->is('admin/peminjaman*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-handshake"></i>

                        <p>Peminjaman</p>

                    </a>

                </li>


                {{-- PENGEMBALIAN --}}
                <li class="nav-item">

                    <a href="{{ route('admin.pengembalian') }}"
                        class="nav-link {{ request()->is('admin/pengembalian*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-undo"></i>

                        <p>Pengembalian</p>

                    </a>

                </li>


                {{-- LAPORAN --}}
                <li class="nav-item">

                    <a href="{{ route('admin.laporan') }}"
                        class="nav-link">

                        <i class="nav-icon fas fa-file"></i>

                        <p>Laporan</p>

                    </a>

                </li>


                {{-- LOG --}}
                <li class="nav-item">

                    <a href="{{ route('admin.log') }}"
                        class="nav-link">

                        <i class="nav-icon fas fa-history"></i>

                        <p>Log Activity</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>
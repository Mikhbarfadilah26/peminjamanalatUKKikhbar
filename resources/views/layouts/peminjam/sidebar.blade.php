<body class="hold-transition sidebar-mini layout-fixed">

    {{-- SIDEBAR --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4 fixed-sidebar">

        {{-- LOGO --}}
        <a href="{{ route('peminjam.dashboard') }}"
           class="brand-link d-flex align-items-center justify-content-center gap-2">

            {{-- LOGO ICON --}}
            <div class="logo-box">
                <i class="fas fa-user-circle"></i>
            </div>

            <span class="brand-text font-weight-bold">
                PEMINJAM UKK
            </span>

        </a>

        {{-- SIDEBAR MENU --}}
        <div class="sidebar">

            <nav class="mt-2">

                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu">

                    <li class="nav-item">
                        <a href="{{ route('peminjam.dashboard') }}"
                           class="nav-link {{ request()->is('peminjam/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('peminjam.alat') }}"
                           class="nav-link {{ request()->is('peminjam/alat*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Daftar Alat</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('peminjam.status') }}"
                           class="nav-link {{ request()->is('peminjam/status*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Status Peminjaman</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('peminjam.pengembalian') }}"
                           class="nav-link {{ request()->is('peminjam/pengembalian*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-undo"></i>
                            <p>Pengembalian Saya</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('peminjam.profil') }}"
                           class="nav-link {{ request()->is('peminjam/profil*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>

                </ul>

            </nav>

        </div>

    </aside>

</body>
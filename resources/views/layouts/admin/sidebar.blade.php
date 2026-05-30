
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- LOGO --}}
    <a href="{{ route('admin.dashboard') }}"
        class="brand-link d-flex align-items-center justify-content-center"
        style="height: 72px;">

        {{-- ICON --}}
        <div class="d-flex align-items-center justify-content-center mr-2"
            style="
                width: 44px;
                height: 44px;
                border-radius: 12px;
                background: linear-gradient(135deg, #007bff, #6610f2);
                box-shadow: 0 4px 10px rgba(0,0,0,0.25);
            ">

            <i class="fas fa-user-cog text-white"
                style="font-size: 18px;"></i>

        </div>

        {{-- TEXT --}}
        <div class="text-left">

            <span class="brand-text font-weight-bold text-white d-block"
                style="
                    font-size: 15px;
                    letter-spacing: 1px;
                    line-height: 1.1;
                ">

                DASHBOARD ADMIN

            </span>

            <small style="
                    color: rgba(255,255,255,0.7);
                    font-size: 11px;
                    letter-spacing: 1px;
                ">

                SISTEM PEMINJAMAN

            </small>

        </div>

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

                        <p> konfirmasi Peminjaman</p>

                    </a>

                </li>


                {{-- PENGEMBALIAN --}}
                <li class="nav-item">

                    <a href="{{ route('admin.pengembalian') }}"
                        class="nav-link {{ request()->is('admin/pengembalian*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-undo"></i>

                        <p>Verifikasi Pengembalian</p>

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

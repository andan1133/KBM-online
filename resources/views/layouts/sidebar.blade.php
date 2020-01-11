<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-lime">
    <!-- Brand Logo -->
    <a href="{{ route('home.index') }}" class="brand-link">
        <img src="{{ asset('img/logo1.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SMKN 1 MEJAYAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-12 pb-12 mb-12 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home.index') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                @admin
                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ request()->is(['user', 'user/create', 'user/edit/*']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kelas.index') }}"
                        class="nav-link {{ request()->is(['kelas', 'kelas/create', 'kelas/edit/*']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kelas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mp.index') }}"
                        class="nav-link {{ request()->is(['matapelajaran', 'matapelajaran/create', 'matapelajaran/edit/*']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Mata Pelajaran
                        </p>
                    </a>
                </li>
                @endadmin
                <li class="nav-item">
                    <a href="{{ route('jadwal.index') }}"
                        class="nav-link {{ request()->is(['jadwal', 'jadwal/create', 'jadwal/edit/*']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Jadwal
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-success">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-th-large"></i>
                @admin
                @if ($absen)
                <span class="badge badge-warning navbar-badge">{{ $absen }}</span>
                @endif
                @endadmin
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                @admin
                <a href="{{ route('jadwal.index') }}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> {{ $absen }} sedang mengajar
                    @if ($absen)
                    <span class="float-right text-muted text-sm">{{ $minute }}</span>
                    @endif
                </a>
                @endadmin
                <div class="dropdown-divider"></div>
                <a href="#" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item dropdown-footer">Logout</a>
            </div>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>
<!-- /.navbar -->
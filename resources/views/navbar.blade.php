<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm p-2 fixed-top mb-5">
    <div class="container fw-medium">
        <a class="navbar-brand ms-md-5 mb-1" href="{{ url('/') }}">Laravel Gua</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-md-5">
                <li class="nav-item me-2">
                    <a class="nav-link" href="{{ url('siswa') }}" id="siswaMenu">Siswa</a>
                </li>
                @auth
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ url('kelas') }}" id="kelasMenu">Kelas</a>
                    </li>
                @endauth
                @auth
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ url('hobi') }}" id="hobiMenu">Hobi</a>
                    </li>
                @endauth
                <li class="nav-item me-2">
                    <a class="nav-link" href="{{ url('/#about') }}" id="aboutMenu">About</a>
                </li>
                @auth
                    @if (auth()->user()->level == 'admin')
                        <li class="nav-item me-2">
                            <a class="nav-link" href="{{ url('user') }}" id="userMenu">User</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto me-md-5">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ url('logout') }}">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link login-link" href="{{ url('login') }}">
                            <i class="bi bi-box-arrow-right"
                                style="font-size: 1.2rem; margin-right: 1px; font-weight: bold;"></i>
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Brand Start -->
<div class="container-fluid bg-primary text-white pt-4 pb-5 d-none d-lg-flex">
    <div class="container pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi bi-telephone-inbound fs-2"></i>
                <div class="ms-3">
                    <h5 class="text-white mb-0">Call Now</h5>
                    <span>+62 812-3456-7890</span>
                </div>
            </div>

            <a href="index.html" class="d-flex align-items-center">
                <img src="{{ asset('assets-guest/img/kependudukan.jpg') }}" alt="Logo Kependudukan" style="height:55px;">
            </a>

            <div class="d-flex align-items-center">
                <i class="bi bi-envelope fs-2"></i>
                <div class="ms-3">
                    <h5 class="text-white mb-0">Mail Now</h5>
                    <span>binadesa@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand End -->

<!-- Navbar Start -->
<div class="container-fluid sticky-top shadow-sm bg-white">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">

            <!-- BRAND MOBILE -->
            <a href="{{ route('dashboard') }}" class="navbar-brand d-lg-none">
                <h1 class="text-primary m-0">Data<span class="text-dark">Kependudukan</span></h1>
            </a>

            <!-- Toggle Responsive -->
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <div class="navbar-nav mx-auto d-flex align-items-center text-center gap-2">

                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="nav-item nav-link d-flex align-items-center
                       {{ Request::routeIs('dashboard') ? 'text-primary fw-semibold' : 'text-dark' }}">
                        <i class="bi bi-bar-chart-fill me-1 text-primary"></i> Dashboard
                    </a>

                    <!-- Warga -->
                    <a href="{{ route('warga.index') }}"
                        class="nav-item nav-link d-flex align-items-center
                       {{ Request::routeIs('warga.*') ? 'text-success fw-semibold' : 'text-dark' }}">
                        <i class="bi bi-people-fill me-1 text-success"></i> Warga
                    </a>

                    <!-- Keluarga -->
                    <a href="{{ route('kependudukan.index') }}"
                        class="nav-item nav-link d-flex align-items-center
                       {{ Request::routeIs('kependudukan.*') ? 'text-warning fw-semibold' : 'text-dark' }}">
                        <i class="bi bi-house-heart-fill me-1 text-warning"></i> Keluarga
                    </a>

                    <!-- Anggota -->
                    <a href="{{ route('anggota-keluarga.index') }}"
                        class="nav-item nav-link d-flex align-items-center
                       {{ Request::routeIs('anggota-keluarga.*') ? 'text-info fw-semibold' : 'text-dark' }}">
                        <i class="bi bi-people-fill me-1 text-info"></i> Anggota
                    </a>

                    <!-- User -->
                    <a href="{{ route('user.index') }}"
                        class="nav-item nav-link d-flex align-items-center
                       {{ Request::routeIs('user.*') ? 'text-danger fw-semibold' : 'text-dark' }}">
                        <i class="bi bi-person-badge-fill me-1 text-danger"></i> User
                    </a>

                    <!-- Peristiwa Dropdown -->
                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle stylish-dropdown
                           {{ Request::routeIs('kelahiran.*') || Request::routeIs('kematian.*') || Request::routeIs('pindah.*')
                               ? 'text-primary fw-semibold'
                               : 'text-dark' }}"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-calendar-event-fill me-1 text-primary"></i> Peristiwa
                        </a>

                        <div class="dropdown-menu shadow-lg border-0 rounded-3 animate-dropdown">
                            <a href="{{ route('kelahiran.index') }}" class="dropdown-item">Kelahiran</a>
                            <a href="{{ route('kematian.index') }}" class="dropdown-item">Kematian</a>
                            <a href="{{ route('pindah.index') }}" class="dropdown-item">Pindah Domisili</a>
                        </div>
                    </div>

                    <!-- About Dropdown -->
                    <div class="nav-item dropdown">
                        <a href="#"
                            class="nav-link dropdown-toggle stylish-dropdown
                           {{ Request::routeIs('guest.pages.*') ? 'text-primary fw-semibold' : 'text-dark' }}"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-folder-fill me-1 text-secondary"></i> About
                        </a>

                        <div class="dropdown-menu shadow-lg border-0 rounded-3 animate-dropdown">
                            <a href="{{ route('guest.pages.about') }}" class="dropdown-item">Tentang</a>
                            <a href="{{ route('guest.pages.layanan') }}" class="dropdown-item">Layanan</a>
                            <a href="{{ route('guest.pages.kontak') }}" class="dropdown-item">Kontak</a>
                        </div>
                    </div>

                    <!-- USER NAVBAR DROPDOWN (DISEMPETKAN DI SAMPING ABOUT) -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle stylish-dropdown d-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <img src="https://i.pravatar.cc/40" class="rounded-circle me-1 shadow-sm" width="34"
                                height="34">
                            <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 p-0"
                            style="width: 220px; overflow: hidden;">
                            <li class="p-3 bg-light border-bottom">
                                <div class="fw-semibold">{{ Auth::user()->name }}</div>
                                <small class="text-muted">Login: {{ session('login_time') }}</small>
                            </li>
                            <li><a class="dropdown-item py-2" href="#">My Profile</a></li>
                            <li><a class="dropdown-item py-2" href="#">Settings</a></li>
                            <li><a class="dropdown-item py-2" href="#">Messages</a></li>
                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>
                            <li><a class="dropdown-item text-danger fw-semibold py-2"
                                    href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

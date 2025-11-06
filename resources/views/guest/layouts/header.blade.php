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

            <a href="/" class="h1 text-white mb-0 text-center">Data<span class="text-dark">Kependudukan</span></a>

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
            <a href="{{ route('dashboard') }}" class="navbar-brand d-lg-none">
                <h1 class="text-primary m-0">Data<span class="text-dark">Kependudukan</span></h1>
            </a>

            <!-- Button Toggler -->
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                <div class="navbar-nav d-flex align-items-center text-center">

                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ Request::routeIs('dashboard') ? 'text-primary fw-semibold' : 'text-dark' }}">
                        <i class="bi bi-bar-chart-fill me-2 text-primary"></i> Dashboard
                    </a>

                    <!-- Data Warga -->
                    <a href="{{ route('warga.index') }}" class="nav-item nav-link {{ Request::routeIs('warga.*') ? 'text-success fw-semibold' : 'text-dark' }}">
                        <i class="bi bi-people-fill me-2 text-success"></i> Data Warga
                    </a>

                    <!-- Data Keluarga -->
                    <a href="{{ route('kependudukan.index') }}" class="nav-item nav-link {{ Request::routeIs('kependudukan.*') ? 'text-warning fw-semibold' : 'text-dark' }}">
                        <i class="bi bi-house-heart-fill me-2 text-warning"></i> Data Keluarga
                    </a>

                    <!-- Data User -->
                    <a href="{{ route('user.index') }}" class="nav-item nav-link {{ Request::routeIs('user.*') ? 'text-danger fw-semibold' : 'text-dark' }}">
                        <i class="bi bi-person-badge-fill me-2 text-danger"></i> Data User
                    </a>

                    <!-- Dropdown Pages -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle stylish-dropdown {{ Request::routeIs('guest.pages.*') ? 'text-primary fw-semibold' : 'text-dark' }}" data-bs-toggle="dropdown">
                            <i class="bi bi-folder-fill me-2 text-secondary"></i> About
                        </a>
                        <div class="dropdown-menu shadow-lg border-0 rounded-3 animate-dropdown">
                            <a href="{{ route('guest.pages.about') }}" class="dropdown-item cool-item {{ Request::routeIs('guest.pages.about') ? 'text-primary fw-semibold' : 'text-dark' }}">
                                <i class="bi bi-info-square-fill me-2 text-primary"></i> Tentang
                            </a>
                            <a href="{{ route('guest.pages.layanan') }}" class="dropdown-item cool-item {{ Request::routeIs('guest.pages.layanan') ? 'text-success fw-semibold' : 'text-dark' }}">
                                <i class="bi bi-sliders2-vertical me-2 text-success"></i> Layanan
                            </a>
                            <a href="{{ route('guest.pages.kontak') }}" class="dropdown-item cool-item {{ Request::routeIs('guest.pages.kontak') ? 'text-danger fw-semibold' : 'text-dark' }}">
                                <i class="bi bi-envelope-paper-fill me-2 text-danger"></i> Kontak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->


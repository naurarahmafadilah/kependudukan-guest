<!-- Brand Start -->
<div class="container-fluid bg-primary text-white pt-4 pb-5 d-none d-lg-flex">
    <div class="container pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi bi-telephone-fill fs-3 text-white"></i>
                <div class="ms-3">
                    <h6 class="text-white mb-0">Telepon</h6>
                    <span class="fw-semibold text-warning">
                        +62 821 7379 4219
                    </span>
                </div>
            </div>


            <a href="index.html" class="d-flex align-items-center">
                <img src="{{ asset('assets-guest/img/kependudukan.png') }}" alt="Logo Kependudukan"
                    style="height:70px;">
            </a>
            <div class="d-flex align-items-center">
                <i class="bi bi-envelope-fill fs-3 text-white"></i>
                <div class="ms-3">
                    <h6 class="text-white mb-0">Email</h6>
                    <span class="fw-semibold text-warning">
                        nusadata@gmail.com
                    </span>
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
            <a href="{{ route('home') }}" class="navbar-brand d-lg-none">
                <h1 class="text-primary m-0">
                    Data<span class="text-dark">Kependudukan</span>
                </h1>
            </a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto d-flex align-items-center gap-2">

                    {{-- ================= BELUM LOGIN ================= --}}
                    @guest
                    <!-- About -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-folder-fill me-2 text-secondary"></i> About
                        </a>

                        <div class="dropdown-menu shadow-lg border-0 rounded-3">
                            <a href="{{ route('guest.pages.about') }}" class="dropdown-item">
                                <i class="bi bi-info-circle-fill me-2 text-primary"></i> Tentang
                            </a>
                            <a href="{{ route('guest.pages.layanan') }}" class="dropdown-item">
                                <i class="bi bi-briefcase-fill me-2 text-success"></i> Layanan
                            </a>
                            <a href="{{ route('guest.pages.kontak') }}" class="dropdown-item">
                                <i class="bi bi-telephone-fill me-2 text-warning"></i> Kontak
                            </a>
                        </div>
                    </div>

                    <!-- Login -->
                    <a href="{{ route('login') }}"
                        class="nav-item nav-link fw-semibold text-primary">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                    @endguest


                    {{-- ================= SUDAH LOGIN ================= --}}
                    @auth
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link">
                        <i class="bi bi-bar-chart-fill me-1 text-primary"></i> Dashboard
                    </a>

                    <a href="{{ route('warga.index') }}" class="nav-item nav-link">
                        <i class="bi bi-people-fill me-1 text-success"></i> Warga
                    </a>

                    <a href="{{ route('kependudukan.index') }}" class="nav-item nav-link">
                        <i class="bi bi-house-heart-fill me-1 text-warning"></i> Keluarga
                    </a>

                    <a href="{{ route('anggota-keluarga.index') }}" class="nav-item nav-link">
                        <i class="bi bi-people-fill me-1 text-info"></i> Anggota
                    </a>

                    <a href="{{ route('user.index') }}" class="nav-item nav-link">
                        <i class="bi bi-person-badge-fill me-1 text-danger"></i> User
                    </a>

                    <!-- Peristiwa -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-calendar-event-fill me-2 text-primary"></i> Peristiwa
                        </a>

                        <div class="dropdown-menu shadow-lg border-0 rounded-3">
                            <a href="{{ route('kelahiran.index') }}" class="dropdown-item">
                                <i class="bi bi-emoji-smile-fill me-2 text-success"></i> Kelahiran
                            </a>
                            <a href="{{ route('kematian.index') }}" class="dropdown-item">
                                <i class="bi bi-emoji-dizzy-fill me-2 text-danger"></i> Kematian
                            </a>
                            <a href="{{ route('pindah.index') }}" class="dropdown-item">
                                <i class="bi bi-truck me-2 text-warning"></i> Pindah Domisili
                            </a>
                        </div>
                    </div>

                    <!-- About -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-folder-fill me-2 text-secondary"></i> About
                        </a>

                        <div class="dropdown-menu shadow-lg border-0 rounded-3">
                            <a href="{{ route('guest.pages.about') }}" class="dropdown-item">
                                <i class="bi bi-info-circle-fill me-2 text-primary"></i> Tentang
                            </a>
                            <a href="{{ route('guest.pages.layanan') }}" class="dropdown-item">
                                <i class="bi bi-briefcase-fill me-2 text-success"></i> Layanan
                            </a>
                            <a href="{{ route('guest.pages.kontak') }}" class="dropdown-item">
                                <i class="bi bi-telephone-fill me-2 text-warning"></i> Kontak
                            </a>
                        </div>
                    </div>

                    <!-- USER DROPDOWN -->
                    <div class="nav-item dropdown">
                        @auth
                        <img src="https://i.pravatar.cc/40?u={{ Auth::user()->email }}"
                            class="rounded-circle me-2 shadow-sm"
                            width="34" height="34">
                        <span class="fw-semibold">{{ Auth::user()->name }}</span>
                        @endauth


                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 p-0"
                            style="width:220px;">
                            <li class="p-3 bg-light border-bottom">
                                <div class="fw-semibold">{{ Auth::user()->name }}</div>
                                <small class="text-muted">
                                    Login: {{ session('login_time') }}
                                </small>
                            </li>

                            <!-- MENU -->
                            <li>
                                <a class="dropdown-item py-2" href="#">
                                    <i class="bi bi-person-circle me-2"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="#">
                                    <i class="bi bi-gear me-2"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2" href="#">
                                    <i class="bi bi-envelope me-2"></i> Messages
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>

                            <li>
                                <a class="dropdown-item py-2 text-danger fw-semibold"
                                    href="{{ route('logout') }}">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endauth

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
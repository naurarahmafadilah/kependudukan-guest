<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Kependudukan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-guest/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


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
                    <h1 class="text-primary m-0">Data<span class="text-dark">Kependudukan</span></h1>
                </a>

                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto d-flex align-items-center gap-2">

                        {{-- ================= BELUM LOGIN ================= --}}
                        @guest
                        <!-- ABOUT (SATU-SATUNYA AKSES) -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-folder-fill me-2 text-secondary"></i> About
                            </a>

                            <div class="dropdown-menu shadow-lg border-0 rounded-3 animate-dropdown">
                                <a href="{{ route('guest.pages.about') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-info-circle-fill me-2 text-primary"></i> Tentang
                                </a>
                                <a href="{{ route('guest.pages.layanan') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-briefcase-fill me-2 text-success"></i> Layanan
                                </a>
                                <a href="{{ route('guest.pages.kontak') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-telephone-fill me-2 text-warning"></i> Kontak
                                </a>
                            </div>
                        </div>

                        <!-- LOGIN -->
                        <a href="{{ route('login') }}"
                            class="nav-item nav-link d-flex align-items-center text-primary fw-semibold">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                        @endguest


                        {{-- ================= SUDAH LOGIN ================= --}}
                        @auth
                        <a href="{{ route('dashboard') }}" class="nav-item nav-link d-flex align-items-center">
                            <i class="bi bi-bar-chart-fill me-1 text-primary"></i> Dashboard
                        </a>

                        <a href="{{ route('warga.index') }}" class="nav-item nav-link d-flex align-items-center">
                            <i class="bi bi-people-fill me-1 text-success"></i> Warga
                        </a>

                        <a href="{{ route('kependudukan.index') }}" class="nav-item nav-link d-flex align-items-center">
                            <i class="bi bi-house-heart-fill me-1 text-warning"></i> Keluarga
                        </a>

                        <a href="{{ route('anggota-keluarga.index') }}" class="nav-item nav-link d-flex align-items-center">
                            <i class="bi bi-people-fill me-1 text-info"></i> Anggota
                        </a>

                        <a href="{{ route('user.index') }}" class="nav-item nav-link d-flex align-items-center">
                            <i class="bi bi-person-badge-fill me-1 text-danger"></i> User
                        </a>

                        <!-- PERISTIWA -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-calendar-event-fill me-2 text-primary"></i> Peristiwa
                            </a>

                            <div class="dropdown-menu shadow-lg border-0 rounded-3 animate-dropdown">
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

                        <!-- USER DROPDOWN -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <img src="https://i.pravatar.cc/40?u={{ Auth::user()->email }}"
                                    class="rounded-circle me-1 shadow-sm"
                                    width="34" height="34">
                                <span class="fw-semibold text-dark">{{ Auth::user()->name }}</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 p-0"
                                style="width: 220px;">
                                <li class="p-3 bg-light border-bottom">
                                    <div class="fw-semibold">{{ Auth::user()->name }}</div>
                                    <small class="text-muted">
                                        Login: {{ session('login_time') }}
                                    </small>
                                </li>

                                <li>
                                    <a class="dropdown-item py-2" href="#">
                                        <i class="bi bi-person-circle me-2"></i> My Profile
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider my-1">
                                </li>

                                <li>
                                    <a class="dropdown-item text-danger fw-semibold py-2"
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



    <!-- Carousel Start -->
    <div class="container-fluid header-carousel px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- SLIDE 1 -->
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets-guest/img/desa.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <h1 class="display-1 text-white animated slideInRight mb-3">
                                        Selamat Datang di Data Kependudukan
                                    </h1>

                                    {{-- JIKA BELUM LOGIN --}}
                                    @guest
                                    <a href="{{ route('login') }}"
                                        class="btn btn-primary py-3 px-5 animated slideInRight">
                                        <i class="bi bi-box-arrow-in-right me-2"></i> Login
                                    </a>
                                    @endguest

                                    {{-- JIKA SUDAH LOGIN --}}
                                    @auth
                                    <a href="{{ route('dashboard') }}"
                                        class="btn btn-success py-3 px-5 animated slideInRight">
                                        <i class="bi bi-speedometer2 me-2"></i> Masuk Dashboard
                                    </a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets-guest/img/desa2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <h1 class="display-1 text-white animated slideInLeft mb-3">
                                        Data Kependudukan
                                    </h1>
                                    <a href="#about"
                                        class="btn btn-outline-light py-3 px-5 animated slideInLeft">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button"
                data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button"
                data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->



    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="row g-5 align-items-center">

                <!-- LEFT IMAGE -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-2">
                        <div class="col-6">
                            <img class="img-fluid rounded-3" src="{{ asset('assets-guest/img/about-1.jpg') }}">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid rounded-3" src="{{ asset('assets-guest/img/about-2.jpg') }}">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid rounded-3" src="{{ asset('assets-guest/img/about-3.jpg') }}">
                        </div>
                        <div class="col-6">
                            <div
                                class="bg-primary text-center h-100 rounded-3 d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-people-fill fs-1 text-white mb-2"></i>
                                <h2 class="text-white mb-0" data-toggle="counter-up">100%</h2>
                                <small class="text-white">Data Terintegrasi</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT CONTENT -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.4s">
                    <h6 class="text-primary fw-semibold mb-2">Tentang NusaData</h6>
                    <h1 class="display-6 mb-4 fw-bold">
                        Sistem Informasi Kependudukan Digital Desa
                    </h1>

                    <p class="mb-4 text-muted">
                        <strong>NusaData</strong> adalah platform sistem informasi kependudukan berbasis web yang
                        dirancang untuk membantu desa dalam mengelola data warga secara
                        <strong>terstruktur, akurat, dan aman</strong>.
                    </p>

                    <p class="mb-4 text-muted">
                        Sistem ini mencakup pengelolaan data warga, kartu keluarga, anggota keluarga,
                        serta pencatatan peristiwa penting seperti
                        <strong>kelahiran, kematian, dan perpindahan domisili</strong>.
                    </p>

                    <!-- FEATURES -->
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success fs-4 me-2"></i>
                                <span>Data kependudukan terpusat</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-shield-lock-fill text-success fs-4 me-2"></i>
                                <span>Aman & berbasis hak akses</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-speedometer2 text-success fs-4 me-2"></i>
                                <span>Akses cepat & real-time</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-diagram-3-fill text-success fs-4 me-2"></i>
                                <span>Terintegrasi antar data</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->




    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>


    <!-- Footer Start -->
    <footer class="bg-primary text-white text-center py-3">
        <p class="mb-0">© {{ date('Y') }} | Bina Desa - Kependudukan</p>
    </footer>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-guest/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

</body>

</html>
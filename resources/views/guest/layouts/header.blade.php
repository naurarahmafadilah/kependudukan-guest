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
<div class="container-fluid sticky-top shadow-sm">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-2 px-lg-3">
      <a href="/" class="navbar-brand d-lg-none">
        <h1 class="text-primary m-0">Data<span class="text-dark">Kependudukan</span></h1>
      </a>
      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
        <div class="navbar-nav">

          <a href="{{ url('/') }}"
             class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="fas fa-home me-1"></i> Home
          </a>

          <a href="{{ url('/about') }}"
             class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">
            <i class="fas fa-info-circle me-1"></i> Tentang
          </a>

          <a href="{{ url('/layanan') }}"
             class="nav-item nav-link {{ Request::is('layanan') ? 'active' : '' }}">
            <i class="fas fa-hand-holding-heart me-1"></i> Layanan
          </a>

          <a href="{{ url('/kontak') }}"
             class="nav-item nav-link {{ Request::is('kontak') ? 'active' : '' }}">
            <i class="fas fa-envelope me-1"></i> Kontak
          </a>

        </div>
      </div>
    </nav>
  </div>
</div>
<!-- Navbar End -->

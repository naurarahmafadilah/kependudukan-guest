<!-- Brand Start -->
<div class="container-fluid bg-primary text-white pt-4 pb-5 d-none d-lg-flex">
  <div class="container pb-2">
    <div class="d-flex align-items-center justify-content-between">
      <div class="d-flex">
        <i class="bi bi-telephone-inbound fs-2"></i>
        <div class="ms-3">
          <h5 class="text-white mb-0">Call Now</h5>
          <span>+012 345 6789</span>
        </div>
      </div>
      <a href="{{ route('dashboard') }}" class="h1 text-white mb-0">Data<span class="text-dark">Kependudukan</span></a>
      <div class="d-flex">
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
<div class="container-fluid sticky-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">
      <a href="{{ route('dashboard') }}" class="navbar-brand d-lg-none">
        <h1 class="text-primary m-0">Data<span class="text-dark">Kependudukan</span></h1>
      </a>
      <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
          <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
          <a href="{{ route('warga.index') }}" class="nav-item nav-link {{ request()->is('warga*') ? 'active' : '' }}">Data Warga</a>
          <a href="{{ route('kependudukan.index') }}" class="nav-item nav-link {{ request()->is('kependudukan*') ? 'active' : '' }}">Data Keluarga</a>
          <a href="{{ route('user.index') }}" class="nav-item nav-link {{ request()->is('user*') ? 'active' : '' }}">Data User</a>

          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
            <div class="dropdown-menu bg-light m-0">
              <a href="#" class="dropdown-item">Features</a>
              <a href="#" class="dropdown-item">Our Team</a>
              <a href="#" class="dropdown-item">Testimonial</a>
              <a href="#" class="dropdown-item">Appoinment</a>
              <a href="#" class="dropdown-item">404 Page</a>
            </div>
          </div>

          <a href="#" class="nav-item nav-link">Contact</a>
        </div>
      </div>
    </nav>
  </div>
</div>
<!-- Navbar End -->

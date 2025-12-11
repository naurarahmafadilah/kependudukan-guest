<!DOCTYPE html>
<html lang="id">

<head>
  @include('guest.layouts.css')
</head>

<body>
  {{-- Spinner --}}
  @include('guest.layouts.spinner')

  {{-- Header + Navbar --}}
  @include('guest.layouts.header')

  {{-- Konten dinamis --}}
  <main class="min-vh-100 bg-light">
    @yield('content')
  </main>

  <!-- Floating WhatsApp Button -->
  <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-float">
    <i class="fab fa-whatsapp"></i>
  </a>


  {{-- Footer --}}
  @include('guest.layouts.footer')

  {{-- Scripts --}}
  @include('guest.layouts.scripts')
</body>

</html>
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
    <a href="https://wa.me/6281234567890" target="_blank"
       style="position: fixed; bottom: 25px; right: 25px; background-color: #25D366; color: white; padding: 15px 20px; border-radius: 50%; font-size: 24px; box-shadow: 0px 3px 6px rgba(0,0,0,0.3);">
        <i class="fab fa-whatsapp"></i>
    </a>

  {{-- Footer --}}
  @include('guest.layouts.footer')

  {{-- Scripts --}}
  @include('guest.layouts.scripts')
</body>
</html>

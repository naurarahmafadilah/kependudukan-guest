<!DOCTYPE html>
<html lang="id">
<head>
  @include('guest.layouts.head')
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

  {{-- Footer --}}
  @include('guest.layouts.footer')

  {{-- Scripts --}}
  @include('guest.layouts.scripts')
</body>
</html>

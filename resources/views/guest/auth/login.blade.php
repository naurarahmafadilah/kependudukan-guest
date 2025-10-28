<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
    <link href="{{ asset('assets-guest/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets-guest/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Bootstrap & Template Stylesheet -->
    <link href="{{ asset('assets-guest/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/style.css')}}" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Roboto', sans-serif;
        }

        .login-card {
            background: #fff;
            width: 350px;
            /* kecil tapi tetap proporsional */
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-login {
            background-color: #194387ff;
            color: white;
            width: 100%;
            font-weight: 500;
        }

        .btn-login:hover {
            background-color: #194387ff;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .alert {
            padding: 8px;
            font-size: 14px;
        }

        .text-muted {
            font-size: 13px;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <i class="bi bi-person-circle text-success" style="font-size: 3rem;"></i>
            <h4 class="mt-2 fw-bold">Login Bina Desa</h4>
            <p class="text-muted">Masuk dengan akun Anda</p>
        </div>

        {{-- Pesan error --}}
        @if ($errors->any())
        <div class="alert alert-danger text-center">
            {{ $errors->first() }}
        </div>
        @endif

        {{-- Pesan sukses login --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- Pesan sukses (termasuk logout) --}}
        @if (session('success'))
        <div class="alert alert-success text-center shadow-sm fade-in" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
        @endif


        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm"
                    placeholder="Masukkan email" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-sm"
                    placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-login py-2">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
        </form>

        <p class="text-center text-muted mt-3 mb-0">
            © 2025 Bina Desa | Sistem Informasi Kependudukan
        </p>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" rel="stylesheet">
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
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-login {
            background-color: #194387;
            color: white;
            width: 100%;
            font-weight: 500;
        }
        .btn-login:hover {
            background-color: #194387;
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

        {{-- Error Login --}}
        @if ($errors->any())
        <div class="alert alert-danger text-center">
            {{ $errors->first() }}
        </div>
        @endif

        {{-- Pesan sukses (misal logout berhasil) --}}
        @if (session('success'))
        <div class="alert alert-success text-center shadow-sm">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control form-control-sm"
                       value="{{ old('email') }}" placeholder="Masukkan email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-sm"
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

</body>
</html>

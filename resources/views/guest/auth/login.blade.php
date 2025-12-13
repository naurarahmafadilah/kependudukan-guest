<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | Bina Desa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1D2D50, #194387);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Roboto', sans-serif;
        }

        .login-card {
            background: #ffffff;
            width: 380px;
            padding: 35px 30px;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-logo {
            width: 160px;
            height: auto;
            margin-bottom: 15px;
        }

        .btn-login {
            background-color: #1D2D50;
            color: #fff;
            width: 100%;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .btn-login:hover {
            background-color: #16305f;
            transform: translateY(-1px);
        }

        .form-control {
            border-radius: 8px;
        }

        .login-footer {
            font-size: 0.85rem;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <!-- LOGO & TITLE -->
        <div class="text-center mb-4 d-flex flex-column align-items-center">
            <img src="{{ asset('assets-guest/img/login.png') }}"
                alt="Logo Bina Desa"
                class="login-logo">

            <h4 class="fw-bold mb-1 text-dark">Login Bina Desa</h4>
            <p class="text-muted mb-0">Masuk dengan akun Anda</p>
        </div>

        {{-- Error Login --}}
        @if ($errors->any())
        <div class="alert alert-danger text-center py-2">
            {{ $errors->first() }}
        </div>
        @endif

        {{-- Pesan sukses --}}
        @if (session('success'))
        <div class="alert alert-success text-center py-2 shadow-sm">
            <i class="bi bi-check-circle-fill me-1"></i>
            {{ session('success') }}
        </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <input type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required>
            </div>

            <button type="submit" class="btn btn-login py-2">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </button>
        </form>

        <!-- FOOTER -->
        <p class="text-center text-muted mt-4 mb-0 login-footer">
            © 2025 Bina Desa <br>
            Sistem Informasi Kependudukan
        </p>

    </div>

</body>

</html>

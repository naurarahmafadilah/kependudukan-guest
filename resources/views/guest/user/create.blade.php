@extends('guest.layouts.app')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-sm border-0" style="width: 500px;">
        <div class="card-body">
            <h4 class="fw-bold text-center mb-3">Tambah User</h4>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Masukkan nama" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control">
                        <option value="admin" {{ (old('role') == 'admin') ? 'selected' : '' }}>Admin</option>
                        <option value="operator" {{ (old('role') == 'operator') ? 'selected' : '' }}>Operator</option>
                        <option value="rt" {{ (old('role') == 'rt') ? 'selected' : '' }}>Ketua RT</option>
                    </select>


                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
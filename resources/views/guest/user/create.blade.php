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

            {{-- 🔴 WAJIB multipart --}}
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Foto User --}}
                <div class="mb-3 text-center">
                    <img src="{{ asset('assets/img/user-default-indo.png') }}"
                         class="rounded-circle shadow-sm mb-2"
                         width="80" height="80"
                         style="object-fit: cover;">
                    <input type="file" name="foto" class="form-control mt-2" accept="image/*">
                    <small class="text-muted">Opsional, bisa diisi nanti</small>
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control"
                        placeholder="Masukkan nama"
                        required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control"
                        placeholder="Masukkan email"
                        required>
                </div>

                {{-- Role --}}
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>
                            Guest
                        </option>
                    </select>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required>
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Konfirmasi password"
                        required>
                </div>

                {{-- Action --}}
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

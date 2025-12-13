@extends('guest.layouts.app')

@section('content')
<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-sm border-0" style="width: 500px;">
        <div class="card-body">
            <h4 class="fw-bold text-center mb-3">Edit User</h4>

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
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Foto User --}}
                <div class="mb-3 text-center">
                    <img src="{{ $user->foto
                            ? asset('storage/'.$user->foto)
                            : asset('assets/img/user-default-indo.png') }}"
                         class="rounded-circle shadow-sm mb-2"
                         width="80" height="80"
                         style="object-fit: cover;">
                    <input type="file" name="foto" class="form-control mt-2" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $user->name) }}"
                           class="form-control"
                           required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $user->email) }}"
                           class="form-control"
                           required>
                </div>

                {{-- Role --}}
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>
                            Guest
                        </option>
                    </select>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label">Password (Opsional)</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Isi jika ingin mengganti password">
                </div>

                {{-- Konfirmasi Password --}}
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Konfirmasi password baru">
                </div>

                {{-- Action --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

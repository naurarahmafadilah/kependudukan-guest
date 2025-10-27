@extends('guest.layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-center mb-4">Data User</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="text-end mb-4">
        <a href="{{ route('user.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus"></i> Tambah User
        </a>
    </div>

    <div class="row justify-content-center">
        @forelse ($user as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-person-circle text-success" style="font-size: 3rem;"></i>
                        <h5 class="mt-2 mb-1 fw-semibold">{{ $item->name }}</h5>
                        <p class="text-muted mb-3">{{ $item->email }}</p>

                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center mt-4">
                <p class="text-muted">Belum ada data user.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 fw-bold text-primary">
    <i class="bi bi-person-badge"></i> Data User
  </h2>

  {{-- Flash --}}
  @if (session('success'))
  <div class="alert alert-success text-center">{{ session('success') }}</div>
  @endif

  {{-- Search + Tambah --}}
  <form method="GET" action="{{ route('user.index') }}" class="mb-4">
    <div class="row g-2 align-items-end">

      {{-- Search (full, mirip Hubungan + Search sebelumnya) --}}
      <div class="col-md-6">
        <div class="input-group">
          <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari nama atau email"
            value="{{ request('search') }}">
          <button class="btn btn-outline-secondary" type="submit">
            <i class="bi bi-search"></i> Cari
          </button>

          @if(request('search'))
          <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
            Clear
          </a>
          @endif
        </div>
      </div>

      {{-- Tambah --}}
      <div class="col-md-6 text-end mt-3 mt-md-0">
        <a href="{{ route('user.create') }}" class="btn btn-success shadow-sm">
          <i class="bi bi-person-plus"></i> Tambah User
        </a>
      </div>

    </div>
  </form>

  {{-- Card list --}}
  @if($user->isEmpty())
  <div class="alert alert-warning text-center">Belum ada data user.</div>
  @else
  <div class="row g-4">
    @foreach($user as $item)
    <div class="col-md-4 col-sm-6">
      <div class="card border-0 shadow-sm h-100 rounded-4">
        <div class="card-body text-center">
          <i class="bi bi-person-circle text-success mb-3" style="font-size: 3rem;"></i>

          <h5 class="card-title fw-bold mb-1">{{ $item->name }}</h5>
          <p class="card-text text-muted mb-2">
            <i class="bi bi-envelope"></i> {{ $item->email }}
          </p>

          <div class="d-flex justify-content-between">
            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </a>

            <form action="{{ route('user.destroy', $item->id) }}" method="POST">
              @csrf @method('DELETE')
              <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">
                <i class="bi bi-trash"></i> Hapus
              </button>
            </form>
          </div>

        </div>
      </div>
    </div>
    @endforeach
  </div>

 {{-- Pagination --}}
@if($user->hasPages())
  <div class="d-flex flex-column align-items-center mt-4 gap-2">
    <div class="text-muted small">
      Menampilkan {{ $user->firstItem() }} – {{ $user->lastItem() }} dari {{ $user->total() }} user
    </div>
    <div>
      {{ $user->links('pagination::bootstrap-5') }}
    </div>
  </div>
@endif
@endif
</div>
@endsection

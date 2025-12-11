@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 fw-bold text-primary">
    <i class="bi bi-person-badge"></i> Data User
  </h2>

  {{-- Flash --}}
  @if (session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
  @endif

  {{-- Filter + Search + Tambah --}}
  <form method="GET" action="{{ route('user.index') }}" class="row g-2 align-items-end mb-4">

    {{-- Filter Role --}}
    <div class="col-md-2">
      <label class="form-label small mb-1">Role</label>
      <select name="role" class="form-select" onchange="this.form.submit()">
        <option value="">Semua Role</option>
        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="operator" {{ request('role') == 'guest' ? 'selected' : '' }}>guest</option>
        <option value="rt" {{ request('role') == 'rt' ? 'selected' : '' }}>Ketua RT</option>
      </select>
    </div>

    {{-- Search --}}
    <div class="col-md-4">
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

        @if(request('search') || request('role'))
        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
          Clear
        </a>
        @endif
      </div>
    </div>

    {{-- Tambah User --}}
    <div class="col-md-4 text-end">
      <a href="{{ route('user.create') }}" class="btn btn-success shadow-sm mt-3 mt-md-0">
        <i class="bi bi-person-plus"></i> Tambah User
      </a>
    </div>
  </form>

  {{-- List User --}}
  @if($user->isEmpty())
  <div class="alert alert-warning text-center">Belum ada data user.</div>
  @else
  <div class="row g-4">
    @foreach($user as $item)
    <div class="col-md-4 col-sm-6">
      <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
        <div class="card-body text-center p-4">

          <i class="bi bi-person-circle text-primary mb-3" style="font-size: 3rem;"></i>

          <h5 class="fw-bold mb-1">{{ $item->name }}</h5>

          <p class="text-muted mb-1">
            <i class="bi bi-envelope"></i>
            {{ $item->email }}
          </p>

          {{-- Role badge --}}
          <p class="mb-3">
            <span class="badge 
              {{ $item->role == 'admin' ? 'bg-primary' :
                 ($item->role == 'operator' ? 'bg-success' : 'bg-warning text-dark') }}">
              {{ ucfirst($item->role) }}
            </span>
          </p>

          <div class="d-flex justify-content-between">
            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm btn-warning">
              <i class="bi bi-pencil-square"></i> Edit
            </a>

            <form action="{{ route('user.destroy', $item->id) }}" method="POST">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')">
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
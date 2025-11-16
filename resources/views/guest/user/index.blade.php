@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 fw-bold text-primary">
    <i class="bi bi-person-badge"></i> Data User
  </h2>

  {{-- Flash message --}}
  @if (session('success'))
    <div class="alert alert-success text-center">
      {{ session('success') }}
    </div>
  @endif

  {{-- Tombol tambah --}}
  <div class="text-end mb-4">
    <a href="{{ route('user.create') }}" class="btn btn-success">
      <i class="bi bi-person-plus"></i> Tambah User
    </a>
  </div>

  {{-- Jika data kosong --}}
  @if($user->isEmpty())
    <div class="alert alert-warning text-center">
      Belum ada data user.
    </div>
  @else
    <div class="row g-4">
      @foreach($user as $item)
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 rounded-3">
            <div class="card-body text-center">
              <i class="bi bi-person-circle text-success mb-3" style="font-size: 3rem;"></i>

              <h5 class="card-title fw-bold mb-1">
                {{ $item->name ?? '-' }}
              </h5>

              <p class="card-text text-muted mb-2">
                <i class="bi bi-envelope"></i>
                {{ $item->email ?? '-' }}
              </p>

              @if(!empty($item->role))
                <p class="card-text mb-3">
                  <i class="bi bi-shield-lock"></i>
                  <strong>Role:</strong> {{ $item->role }}
                </p>
              @endif

              {{-- Tombol aksi --}}
              <div class="d-flex justify-content-between">
                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>

                <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"
                          onclick="return confirm('Yakin ingin menghapus user ini?')">
                    <i class="bi bi-trash"></i> Hapus
                  </button>
                </form>
              </div>

            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection

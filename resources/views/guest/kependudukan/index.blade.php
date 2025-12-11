@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 fw-bold text-success">
    <i class="bi bi-house-door"></i> Data Keluarga KK
  </h2>

  {{-- Flash message --}}
  @if (session('success'))
    <div class="alert alert-success text-center">
      {{ session('success') }}
    </div>
  @endif

  {{-- Filter + Search + Tambah --}}
  <form method="GET" action="{{ route('kependudukan.index') }}" class="row g-2 align-items-end mb-4">
    {{-- Filter RT --}}
    <div class="col-md-2">
      <label class="form-label small mb-1">RT</label>
      <select name="rt" class="form-select" onchange="this.form.submit()">
        <option value="">Semua RT</option>
        @for($i = 1; $i <= 20; $i++)
          <option value="{{ $i }}" {{ request('rt') == $i ? 'selected' : '' }}>RT {{ $i }}</option>
        @endfor
      </select>
    </div>

    {{-- Filter RW --}}
    <div class="col-md-2">
      <label class="form-label small mb-1">RW</label>
      <select name="rw" class="form-select" onchange="this.form.submit()">
        <option value="">Semua RW</option>
        @for($i = 1; $i <= 10; $i++)
          <option value="{{ $i }}" {{ request('rw') == $i ? 'selected' : '' }}>RW {{ $i }}</option>
        @endfor
      </select>
    </div>

    {{-- Search (layout sama kayak Warga, col-md-4) --}}
    <div class="col-md-4">
      <div class="input-group">
        <input
          type="text"
          name="search"
          class="form-control"
          placeholder="Cari No KK atau alamat"
          value="{{ request('search') }}"
        >
        <button class="btn btn-outline-secondary" type="submit">
          <i class="bi bi-search"></i> Cari
        </button>
        @if(request('search') || request('rt') || request('rw'))
          <a href="{{ route('kependudukan.index') }}" class="btn btn-outline-secondary">
            Clear
          </a>
        @endif
      </div>
    </div>

    {{-- Tombol tambah (col-md-4 biar balance sama Warga) --}}
    <div class="col-md-4 text-end">
      <a href="{{ route('kependudukan.create') }}" class="btn btn-success shadow-sm mt-3 mt-md-0">
        <i class="bi bi-plus-circle"></i> Tambah Data KK
      </a>
    </div>
  </form>

  {{-- Tampilkan Data dalam bentuk Card --}}
  @if($keluarga->isEmpty())
    <div class="alert alert-warning text-center">Belum ada data keluarga.</div>
  @else
    <div class="row g-4">
      @foreach($keluarga as $item)
        <div class="col-md-4 col-sm-6">
          <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
            <div class="card-body p-4">
              <h5 class="card-title text-success fw-bold mb-3">
                <i class="bi bi-house"></i> No. KK: {{ $item->kk_nomor ?? '-' }}
              </h5>
              <p class="card-text mb-1">
                <i class="bi bi-person-circle"></i>
                <strong>Kepala Keluarga:</strong> {{ $item->kepalaKeluarga->nama ?? '-' }}
              </p>
              <p class="card-text mb-1">
                <i class="bi bi-geo-alt"></i>
                <strong>Alamat:</strong> {{ $item->alamat ?? '-' }}
              </p>
              <p class="card-text mb-1">
                <i class="bi bi-signpost-split"></i>
                <strong>RT/RW:</strong> {{ $item->rt ?? '-' }}/{{ $item->rw ?? '-' }}
              </p>
            </div>
            <div class="card-footer bg-light border-0 d-flex justify-content-between px-4 py-3">
              <a href="{{ route('kependudukan.edit', $item) }}" class="btn btn-sm btn-warning">
                <i class="bi bi-pencil-square"></i> Edit
              </a>
              <form action="{{ route('kependudukan.destroy', $item) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data KK ini?')">
                  <i class="bi bi-trash"></i> Hapus
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Pagination --}}
    @if($keluarga->hasPages())
      <div class="d-flex flex-column align-items-center mt-4 gap-2">
        <div class="text-muted small">
          Menampilkan {{ $keluarga->firstItem() }} – {{ $keluarga->lastItem() }} dari {{ $keluarga->total() }} keluarga
        </div>
        <div>
          {{ $keluarga->links('pagination::bootstrap-5') }}
        </div>
      </div>
    @endif
  @endif
</div>
@endsection

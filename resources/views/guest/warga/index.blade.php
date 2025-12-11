@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 fw-bold text-primary">
    <i class="bi bi-person-lines-fill"></i> Data Warga
  </h2>

  {{-- Flash message --}}
  @if (session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
  @endif

  {{-- Filter + Search + Tambah --}}
  <form method="GET" action="{{ route('warga.index') }}" class="row g-2 align-items-end mb-4">
    {{-- Filter Jenis Kelamin --}}
    <div class="col-md-2">
      <label class="form-label small mb-1">Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-select" onchange="this.form.submit()">
        <option value="">Semua</option>
        <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>

    {{-- Filter Agama --}}
    <div class="col-md-2">
      <label class="form-label small mb-1">Agama</label>
      <select name="agama" class="form-select" onchange="this.form.submit()">
        <option value="">Semua</option>
        <option value="Islam" {{ request('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
        <option value="Kristen" {{ request('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
        <option value="Katolik" {{ request('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
        <option value="Hindu" {{ request('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
        <option value="Buddha" {{ request('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
        <option value="Konghucu" {{ request('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
      </select>
    </div>

    {{-- Search (sekarang lebarnya sama kayak di Keluarga KK, col-md-4) --}}
    <div class="col-md-4">
      <div class="input-group">
        <input
          type="text"
          name="search"
          class="form-control"
          placeholder="Cari nama, No KTP, pekerjaan, email"
          value="{{ request('search') }}">
        <button class="btn btn-outline-secondary" type="submit">
          <i class="bi bi-search"></i> Cari
        </button>
        @if(request('search') || request('jenis_kelamin') || request('agama'))
        <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary">
          Clear
        </a>
        @endif
      </div>
    </div>

    {{-- Tombol tambah (dibikin col-md-4 biar balance) --}}
    <div class="col-md-4 text-end">
      <a href="{{ route('warga.create') }}" class="btn btn-primary shadow-sm mt-3 mt-md-0">
        <i class="bi bi-plus-circle"></i> Tambah Data
      </a>
    </div>
  </form>

  {{-- Tampilkan Data dalam bentuk Card --}}
  @if($warga->isEmpty())
  <div class="alert alert-warning text-center">Belum ada data warga.</div>
  @else
  <div class="row g-4">
    @foreach($warga as $item)
    <div class="col-md-4 col-sm-6">
      <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
        <div class="card-body p-4">
          <h5 class="card-title text-primary fw-bold mb-3">
            <i class="bi bi-person-circle"></i> {{ $item->nama }}
          </h5>
          <p class="card-text mb-1"><i class="bi bi-person-badge"></i> <strong>No KTP:</strong> {{ $item->no_ktp }}</p>
          <p class="card-text mb-1"><i class="bi bi-gender-ambiguous"></i> <strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</p>
          <p class="card-text mb-1"><i class="bi bi-bookmark-heart"></i> <strong>Agama:</strong> {{ $item->agama }}</p>
          <p class="card-text mb-1"><i class="bi bi-briefcase"></i> <strong>Pekerjaan:</strong> {{ $item->pekerjaan }}</p>
          <p class="card-text mb-1"><i class="bi bi-telephone"></i> <strong>Telp:</strong> {{ $item->telp }}</p>
          <p class="card-text"><i class="bi bi-envelope"></i> <strong>Email:</strong> {{ $item->email }}</p>
        </div>
        <div class="card-footer bg-light border-0 d-flex justify-content-between px-4 py-3">
          <a href="{{ route('warga.edit', $item) }}" class="btn btn-sm btn-warning">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
          <form action="{{ route('warga.destroy', $item) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
              <i class="bi bi-trash"></i> Hapus
            </button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- Pagination --}}
  @if($warga->hasPages())
  <div class="d-flex flex-column align-items-center mt-4 gap-2">
    <div class="text-muted small">
      Menampilkan {{ $warga->firstItem() }} – {{ $warga->lastItem() }} dari {{ $warga->total() }} warga
    </div>
    <div>
      {{ $warga->links('pagination::bootstrap-5') }}
    </div>
  </div>
  @endif
  @endif
</div>
@endsection
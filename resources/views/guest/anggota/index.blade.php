@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold text-success">
        <i class="bi bi-people"></i> Anggota Keluarga
    </h2>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- Filter + Search + Tambah --}}
    <form method="GET" action="{{ route('anggota-keluarga.index') }}" class="row g-3 align-items-end mb-4">

        {{-- Filter Hubungan --}}
        <div class="col-md-3">
            <label class="form-label small">Hubungan</label>
            <select name="hubungan" class="form-select" onchange="this.form.submit()">
                <option value="">Semua Hubungan</option>
                <option value="Kepala Keluarga" {{ request('hubungan')=='Kepala Keluarga'?'selected':'' }}>Kepala Keluarga</option>
                <option value="Istri" {{ request('hubungan')=='Istri'?'selected':'' }}>Istri</option>
                <option value="Anak" {{ request('hubungan')=='Anak'?'selected':'' }}>Anak</option>
            </select>
        </div>

        {{-- Search --}}
        <div class="col-md-5">
            <label class="form-label small">Pencarian</label>
            <div class="input-group">
                <input type="text" name="search" placeholder="Cari nama / NIK / No KK"
                       class="form-control" value="{{ request('search') }}">

                <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>

                @if(request('search') || request('hubungan'))
                    <a href="{{ route('anggota-keluarga.index') }}" class="btn btn-outline-danger">Clear</a>
                @endif
            </div>
        </div>

        {{-- Tombol Tambah --}}
        <div class="col-md-4 text-end">
            <a href="{{ route('anggota-keluarga.create') }}" class="btn btn-success shadow-sm mt-3 mt-md-0">
                <i class="bi bi-plus-circle"></i> Tambah Anggota
            </a>
        </div>
    </form>

    {{-- Tampilkan Data dalam bentuk Card --}}
@if($anggota->isEmpty())
  <div class="alert alert-warning text-center">Belum ada data anggota keluarga.</div>
@else
  <div class="row g-4">
    @foreach($anggota as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">

          {{-- Card Body --}}
          <div class="card-body p-4 small">

            {{-- NAMA ANGGOTA --}}
            <h5 class="card-title text-success fw-bold mb-3">
              <i class="bi bi-person-circle"></i>
              {{ $item->warga->nama ?? 'Anggota #'.$item->anggota_id }}
            </h5>

            <p class="card-text mb-1">
              <i class="bi bi-diagram-3"></i>
              <strong>Hubungan:</strong> {{ $item->hubungan ?? '-' }}
            </p>

            <p class="card-text mb-1">
              <i class="bi bi-house-door"></i>
              <strong>No. KK:</strong> {{ $item->keluarga->kk_nomor ?? '-' }}
            </p>

            <p class="card-text mb-1">
              <i class="bi bi-geo-alt"></i>
              <strong>Alamat KK:</strong> {{ $item->keluarga->alamat ?? '-' }}
            </p>

            <p class="card-text mb-1">
              <i class="bi bi-credit-card-2-front"></i>
              <strong>No KTP:</strong> {{ $item->warga->no_ktp ?? '-' }}
            </p>

            <p class="card-text mb-1">
              <i class="bi bi-gender-ambiguous"></i>
              <strong>Jenis Kelamin:</strong> {{ $item->warga->jenis_kelamin ?? '-' }}
            </p>

            <p class="card-text mb-1">
              <i class="bi bi-bookmark-heart"></i>
              <strong>Agama:</strong> {{ $item->warga->agama ?? '-' }}
            </p>

            <p class="card-text mb-1">
              <i class="bi bi-briefcase"></i>
              <strong>Pekerjaan:</strong> {{ $item->warga->pekerjaan ?? '-' }}
            </p>

            <p class="card-text mb-1">
              <i class="bi bi-telephone"></i>
              <strong>Telp:</strong> {{ $item->warga->telp ?? '-' }}
            </p>

            <p class="card-text mb-1">
              <i class="bi bi-envelope"></i>
              <strong>Email:</strong> {{ $item->warga->email ?? '-' }}
            </p>

          </div>

          {{-- Footer Buttons --}}
          <div class="card-footer bg-light border-0 d-flex justify-content-between px-4 py-3">
            <a href="{{ route('anggota-keluarga.edit', $item) }}" class="btn btn-sm btn-warning">
              <i class="bi bi-pencil-square"></i> Edit
            </a>

            <form method="POST" action="{{ route('anggota-keluarga.destroy', $item) }}" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                <i class="bi bi-trash"></i> Hapus
              </button>
            </form>
          </div>

        </div>
      </div>
    @endforeach
  </div>

  {{-- Pagination --}}
  @if($anggota->hasPages())
  <div class="d-flex flex-column align-items-center mt-4 gap-2 small">
    <div class="text-muted">
      Menampilkan {{ $anggota->firstItem() }} – {{ $anggota->lastItem() }} dari {{ $anggota->total() }} anggota
    </div>
    <div>
      {{ $anggota->links('pagination::bootstrap-5') }}
    </div>
  </div>
  @endif
@endif
@endsection

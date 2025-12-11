@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center mb-4 fw-bold text-primary">
        <i class="bi bi-truck"></i> Data Peristiwa Pindah
    </h2>

    {{-- Flash Message --}}
    @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
    @endif

    {{-- Filter + Search --}}
    <form method="GET" action="{{ route('pindah.index') }}" class="row g-3 align-items-end mb-4">

        {{-- Filter Tanggal Pindah --}}
        <div class="col-md-3">
            <label class="form-label small mb-1">Tanggal Pindah</label>
            <input type="date" name="tgl_pindah" class="form-control"
                value="{{ request('tgl_pindah') }}">
        </div>

        {{-- Filter Alamat Tujuan --}}
        <div class="col-md-3">
            <label class="form-label small mb-1">Alamat Tujuan</label>
            <select name="alamat_tujuan" class="form-select">
                <option value="">Semua Tujuan</option>
                @foreach($pindah->pluck('alamat_tujuan')->unique() as $tujuan)
                <option value="{{ $tujuan }}" {{ request('alamat_tujuan') == $tujuan ? 'selected' : '' }}>
                    {{ $tujuan }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Search --}}
        <div class="col-md-4">
            <label class="form-label small mb-1">Pencarian</label>
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                    placeholder="Cari Warga, Alasan, No Surat"
                    value="{{ request('search') }}">

                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>

                @if(request('search') || request('alamat_tujuan') || request('tgl_pindah'))
                <a href="{{ route('pindah.index') }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </div>
        </div>

        {{-- Tombol Tambah --}}
        <div class="col-md-2 text-end">
            <a href="{{ route('pindah.create') }}"
                class="btn btn-primary d-block shadow-sm">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>

    </form>



    {{-- CARD LIST --}}
    @if($pindah->isEmpty())
    <div class="alert alert-warning text-center">Belum ada data pindah.</div>
    @else

    <div class="row g-4">
        @foreach($pindah as $item)
        <div class="col-md-4 col-sm-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">

                <div class="card-body p-4">

                    <h5 class="card-title fw-bold text-primary mb-3">
                        <i class="bi bi-truck"></i> No Surat: {{ $item->no_surat }}
                    </h5>

                    <p class="card-text mb-1">
                        <i class="bi bi-person-circle"></i>
                        <strong>Nama Warga:</strong> {{ $item->warga->nama ?? '-' }}
                    </p>

                    <p class="card-text mb-1">
                        <i class="bi bi-calendar-check"></i>
                        <strong>Tgl Pindah:</strong> {{ $item->tgl_pindah }}
                    </p>

                    <p class="card-text mb-1">
                        <i class="bi bi-geo-alt-fill"></i>
                        <strong>Alamat Tujuan:</strong> {{ $item->alamat_tujuan }}
                    </p>

                    <p class="card-text mb-1">
                        <i class="bi bi-question-circle"></i>
                        <strong>Alasan:</strong> {{ $item->alasan }}
                    </p>

                </div>

                <div class="card-footer bg-light d-flex justify-content-between px-4 py-3">

                    <a href="{{ route('pindah.show', $item->pindah_id) }}" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-eye"></i> Detail
                    </a>

                    <a href="{{ route('pindah.edit', $item->pindah_id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>

                    <form action="{{ route('pindah.destroy', $item->pindah_id) }}" method="POST">
                        @csrf @method('DELETE')
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
    <div class="d-flex flex-column align-items-center mt-4">
        <div class="text-muted small">
            Menampilkan {{ $pindah->firstItem() }} – {{ $pindah->lastItem() }} dari {{ $pindah->total() }} data
        </div>
        <div>
            {{ $pindah->links('pagination::bootstrap-5') }}
        </div>
    </div>

    @endif

</div>
@endsection
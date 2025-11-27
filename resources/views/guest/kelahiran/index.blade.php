@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center mb-4 fw-bold text-success">
        <i class="bi bi-baby-fill"></i> Data Peristiwa Kelahiran
    </h2>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Filter + Search + Tambah --}}
    <form method="GET" action="{{ route('kelahiran.index') }}" class="row g-2 align-items-end mb-4">

        {{-- Filter Tempat Lahir --}}
        <div class="col-md-2">
            <label class="form-label small mb-1">Tempat Lahir</label>
            <select name="tempat_lahir" class="form-select" onchange="this.form.submit()">
                <option value="">Semua Tempat</option>

                @php
                    $tempatList = $kelahiran->pluck('tempat_lahir')->unique()->sort();
                @endphp

                @foreach($tempatList as $t)
                    <option value="{{ $t }}" {{ request('tempat_lahir') == $t ? 'selected' : '' }}>{{ $t }}</option>
                @endforeach
            </select>
        </div>

        {{-- Filter Tanggal Lahir --}}
        <div class="col-md-2">
            <label class="form-label small mb-1">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="{{ request('tgl_lahir') }}" onchange="this.form.submit()">
        </div>

        {{-- Search --}}
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Warga, No Akta, Tempat Lahir" value="{{ request('search') }}">

                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>

                @if(request('search') || request('tempat_lahir') || request('tgl_lahir'))
                    <a href="{{ route('kelahiran.index') }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </div>
        </div>

        {{-- Tambah --}}
        <div class="col-md-4 text-end">
            <a href="{{ route('kelahiran.create') }}" class="btn btn-success shadow-sm mt-3 mt-md-0">
                <i class="bi bi-plus-circle"></i> Tambah Data Kelahiran
            </a>
        </div>

    </form>


    {{-- CARD LIST --}}
    @if($kelahiran->isEmpty())
        <div class="alert alert-warning text-center">Belum ada data kelahiran.</div>
    @else

    <div class="row g-4">
        @foreach($kelahiran as $item)
        <div class="col-md-4 col-sm-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">

                <div class="card-body p-4">

                    <h5 class="card-title text-success fw-bold mb-3">
                        <i class="bi bi-baby-fill"></i>
                        No Akta: {{ $item->no_akta ?? '-' }}
                    </h5>

                    <p class="card-text mb-1">
                        <i class="bi bi-person-circle"></i>
                        <strong>Nama Anak:</strong> {{ $item->warga->nama ?? '-' }}
                    </p>

                    <p class="card-text mb-1">
                        <i class="bi bi-calendar-event"></i>
                        <strong>Tgl Lahir:</strong> {{ $item->tgl_lahir }}
                    </p>

                    <p class="card-text mb-1">
                        <i class="bi bi-geo-alt-fill"></i>
                        <strong>Tempat Lahir:</strong> {{ $item->tempat_lahir }}
                    </p>

                </div>

                <div class="card-footer bg-light d-flex justify-content-between px-4 py-3">

                    <a href="{{ route('kelahiran.show', $item->kelahiran_id) }}" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-eye"></i> Detail
                    </a>

                    <a href="{{ route('kelahiran.edit', $item->kelahiran_id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>

                    <form action="{{ route('kelahiran.destroy', $item->kelahiran_id) }}" method="POST" class="d-inline">
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

    {{-- PAGINATION --}}
    <div class="d-flex flex-column align-items-center mt-4">
        <div class="text-muted small">
            Menampilkan {{ $kelahiran->firstItem() }} – {{ $kelahiran->lastItem() }} dari {{ $kelahiran->total() }} data
        </div>
        <div>
            {{ $kelahiran->links('pagination::bootstrap-5') }}
        </div>
    </div>

    @endif

</div>
@endsection

@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center mb-4 fw-bold text-danger">
        <i class="bi bi-emoji-dizzy-fill"></i> Data Peristiwa Kematian
    </h2>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Filter + Search + Tambah --}}
    <form method="GET" action="{{ route('kematian.index') }}" class="row g-2 align-items-end mb-4">

        {{-- Filter Tanggal Meninggal --}}
        <div class="col-md-2">
            <label class="form-label small mb-1">Tanggal Meninggal</label>
            <input type="date"
                name="tgl_meninggal"
                class="form-control"
                value="{{ request('tgl_meninggal') }}"
                onchange="this.form.submit()">
        </div>

        {{-- Filter Lokasi --}}
        <div class="col-md-2">
            <label class="form-label small mb-1">Lokasi</label>
            <select name="lokasi" class="form-select" onchange="this.form.submit()">
                <option value="">Semua Lokasi</option>

                @php
                    $lokasiList = $kematian->pluck('lokasi')->unique()->sort();
                @endphp

                @foreach($lokasiList as $lok)
                    <option value="{{ $lok }}" {{ request('lokasi') == $lok ? 'selected' : '' }}>
                        {{ $lok }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Search --}}
        <div class="col-md-4">
            <div class="input-group">
                <input type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari Warga / Lokasi / No Surat / Sebab"
                    value="{{ request('search') }}">

                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>

                @if(request('search') || request('lokasi') || request('tgl_meninggal'))
                    <a href="{{ route('kematian.index') }}" class="btn btn-outline-secondary">
                        Clear
                    </a>
                @endif
            </div>
        </div>

        {{-- Tombol Tambah --}}
        <div class="col-md-4 text-end">
            <a href="{{ route('kematian.create') }}" class="btn btn-danger shadow-sm mt-3 mt-md-0">
                <i class="bi bi-plus-circle"></i> Tambah Data Kematian
            </a>
        </div>

    </form>


    {{-- List Card --}}
    @if($kematian->isEmpty())
        <div class="alert alert-warning text-center">Belum ada data kematian.</div>
    @else

    <div class="row g-4">
        @foreach($kematian as $item)
        <div class="col-md-4 col-sm-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body p-4">

                    <h5 class="card-title text-danger fw-bold mb-3">
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        No Surat: {{ $item->no_surat }}
                    </h5>

                    <p class="card-text mb-1">
                        <i class="bi bi-person-circle"></i>
                        <strong>Nama Warga:</strong> {{ $item->warga->nama ?? '-' }}
                    </p>

                    <p class="card-text mb-1">
                        <i class="bi bi-calendar-x"></i>
                        <strong>Tgl Meninggal:</strong> {{ $item->tgl_meninggal }}
                    </p>

                    <p class="card-text mb-1">
                        <i class="bi bi-geo-alt"></i>
                        <strong>Lokasi:</strong> {{ $item->lokasi }}
                    </p>

                    <p class="card-text mb-1">
                        <i class="bi bi-heartbreak"></i>
                        <strong>Sebab:</strong> {{ $item->sebab }}
                    </p>

                </div>

                <div class="card-footer bg-light d-flex justify-content-between px-4 py-3">

                    {{-- Detail --}}
                    <a href="{{ route('kematian.show', $item->kematian_id) }}" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-eye"></i> Detail
                    </a>

                    {{-- Edit --}}
                    <a href="{{ route('kematian.edit', $item->kematian_id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>

                    {{-- Delete --}}
                    <form action="{{ route('kematian.destroy', $item->kematian_id) }}"
                        method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Hapus data ini?')">
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
            Menampilkan {{ $kematian->firstItem() }} – {{ $kematian->lastItem() }}
            dari {{ $kematian->total() }} data
        </div>

        <div>
            {{ $kematian->links('pagination::bootstrap-5') }}
        </div>
    </div>

    @endif

</div>
@endsection

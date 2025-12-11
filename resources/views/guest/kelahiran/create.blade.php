@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center fw-bold mb-4 text-success">
        <i class="bi bi-baby"></i> Tambah Data Kelahiran
    </h2>

    <div class="card shadow-sm border-0 rounded-4 p-4">

        <form action="{{ route('kelahiran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Warga yang Lahir --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Warga yang Lahir</label>
                <select name="warga_id" class="form-select" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}">
                            {{ $w->nama }} - {{ $w->nik }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal & Tempat Lahir --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Contoh: RSUD Kota" required>
                </div>
            </div>

            {{-- Ayah --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Ayah</label>
                <select name="ayah_warga_id" class="form-select">
                    <option value="">-- Pilih Ayah --</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}">{{ $w->nama }} - {{ $w->nik }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Ibu --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Ibu</label>
                <select name="ibu_warga_id" class="form-select">
                    <option value="">-- Pilih Ibu --</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}">{{ $w->nama }} - {{ $w->nik }}</option>
                    @endforeach
                </select>
            </div>

            {{-- No Akta --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nomor Akta Lahir</label>
                <input type="text" name="no_akta" class="form-control" placeholder="Masukkan No Akta" required>
            </div>

            {{-- Upload Multiple File --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Upload Berkas (Multiple)</label>
                <input type="file" name="files[]" class="form-control" multiple>
                <small class="text-muted">Bisa upload foto bayi, scan akta, surat keterangan, dll.</small>
            </div>

            <div class="text-end">
                <a href="{{ route('kelahiran.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan Data
                </button>
            </div>

        </form>

    </div>

</div>
@endsection

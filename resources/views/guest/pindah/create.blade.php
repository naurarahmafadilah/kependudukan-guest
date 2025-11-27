@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center fw-bold mb-4 text-primary">
        <i class="bi bi-box-arrow-right"></i> Tambah Peristiwa Pindah
    </h2>

    <div class="card shadow-sm border-0 rounded-4 p-4">

        <form method="POST" action="{{ route('pindah.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Warga --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Warga</label>
                <select name="warga_id" class="form-select" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach($warga as $w)
                        <option value="{{ $w->warga_id }}">{{ $w->nama }} - {{ $w->nik }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal Pindah --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Pindah</label>
                <input type="date" name="tgl_pindah" class="form-control" required>
            </div>

            {{-- Alamat Tujuan --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Alamat Tujuan</label>
                <input type="text" name="alamat_tujuan" class="form-control"
                       placeholder="Masukkan alamat tujuan pindah" required>
            </div>

            {{-- Alasan --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Alasan Pindah</label>
                <input type="text" name="alasan" class="form-control"
                       placeholder="Contoh: Pekerjaan, Sekolah, dll">
            </div>

            {{-- No Surat --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nomor Surat Pindah</label>
                <input type="text" name="no_surat" class="form-control"
                       placeholder="Nomor surat resmi" required>
            </div>

            {{-- Upload Multiple File --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Upload Berkas (Multiple)</label>
                <input type="file" name="files[]" class="form-control" multiple>
                <small class="text-muted">Bisa upload scan surat pindah, bukti, dll.</small>
            </div>

            <div class="text-end">
                <a href="{{ route('pindah.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
            </div>

        </form>

    </div>

</div>
@endsection

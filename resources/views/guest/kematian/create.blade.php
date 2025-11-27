@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center fw-bold mb-4 text-danger">
        <i class="bi bi-emoji-dizzy-fill"></i> Tambah Data Kematian
    </h2>

    <form method="POST" action="{{ route('kematian.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="card shadow-sm border-0 p-4 rounded-4">

            <div class="mb-3">
                <label class="form-label">Warga Meninggal</label>
                <select name="warga_id" class="form-select" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach($warga as $w)
                        <option value="{{ $w->warga_id }}">{{ $w->nama }} - {{ $w->nik }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Meninggal</label>
                    <input type="date" name="tgl_meninggal" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tempat Meninggal</label>
                    <input type="text" name="tempat_meninggal" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Penyebab Kematian</label>
                <input type="text" name="penyebab" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Surat Kematian</label>
                <input type="text" name="no_surat_kematian" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload File (Bukti/Surat/Foto) – Multiple</label>
                <input type="file" name="files[]" class="form-control" multiple>
            </div>

            <button class="btn btn-success">
          <i class="bi bi-save"></i> Simpan
        </button>

        <a href="{{ route('kematian.index') }}" class="btn btn-secondary">
          Kembali
        </a>

        </div>

    </form>
</div>
@endsection

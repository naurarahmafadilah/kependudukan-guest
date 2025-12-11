@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center fw-bold mb-4 text-warning">
        <i class="bi bi-pencil-square"></i> Edit Data Kematian
    </h2>

    <form method="POST" action="{{ route('kematian.update', $kematian->kematian_id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card shadow-sm p-4 rounded-4">

            <div class="mb-3">
                <label class="form-label">Warga</label>
                <select class="form-select" name="warga_id">
                    @foreach($warga as $w)
                    <option value="{{ $w->warga_id }}" {{ $kematian->warga_id == $w->warga_id ? 'selected' : '' }}>
                        {{ $w->nama }} - {{ $w->nik }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tanggal Meninggal</label>
                    <input type="date" name="tgl_meninggal" class="form-control" value="{{ $kematian->tgl_meninggal }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tempat Meninggal</label>
                    <input type="text" name="tempat_meninggal" value="{{ $kematian->tempat_meninggal }}" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Penyebab Kematian</label>
                <input type="text" name="penyebab" value="{{ $kematian->penyebab }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Surat Kematian</label>
                <input type="text" name="no_surat_kematian" value="{{ $kematian->no_surat_kematian }}" class="form-control">
            </div>

            <hr>

            <h5 class="mb-3">File Lama</h5>
            @if($media->isEmpty())
            <p class="text-muted">Tidak ada file.</p>
            @else
            <ul>
                @foreach($media as $m)
                <li>
                    <a href="{{ asset('uploads/kematian/' . $m->file_name) }}" target="_blank">
                        <i class="bi bi-file-earmark-check-fill text-success"></i>
                        {{ $m->file_name }}
                    </a>
                </li>
                @endforeach
            </ul>
            @endif

            <hr>

            <div class="mb-3">
                <label class="form-label">Upload File Baru (optional)</label>
                <input type="file" name="files[]" class="form-control" multiple>
            </div>

            <button class="btn btn-warning">
                <i class="bi bi-arrow-repeat"></i> Update
            </button>

            <a href="{{ route('kematian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>

</form>
</div>
@endsection
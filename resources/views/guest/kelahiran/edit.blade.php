@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center fw-bold mb-4 text-warning">
        <i class="bi bi-pencil-square"></i> Edit Data Kelahiran
    </h2>

    <div class="card shadow-sm border-0 rounded-4 p-4">

        <form action="{{ route('kelahiran.update', $kelahiran->kelahiran_id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            {{-- Warga --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Warga yang Lahir</label>
                <select name="warga_id" class="form-select" required>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}"
                            {{ $kelahiran->warga_id == $w->warga_id ? 'selected' : '' }}>
                            {{ $w->nama }} - {{ $w->nik }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tgl & Tempat --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control"
                        value="{{ $kelahiran->tgl_lahir }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control"
                        value="{{ $kelahiran->tempat_lahir }}" required>
                </div>
            </div>

            {{-- Orang tua --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Ayah</label>
                <select name="ayah_warga_id" class="form-select">
                    <option value="">-- Pilih Ayah --</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}"
                            {{ $kelahiran->ayah_warga_id == $w->warga_id ? 'selected' : '' }}>
                            {{ $w->nama }} - {{ $w->nik }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Ibu</label>
                <select name="ibu_warga_id" class="form-select">
                    <option value="">-- Pilih Ibu --</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}"
                            {{ $kelahiran->ibu_warga_id == $w->warga_id ? 'selected' : '' }}>
                            {{ $w->nama }} - {{ $w->nik }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- No Akta --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nomor Akta Lahir</label>
                <input type="text" name="no_akta" class="form-control"
                    value="{{ $kelahiran->no_akta }}" required>
            </div>

            {{-- File lama --}}
            <h5 class="fw-bold mb-2">File Lampiran Lama</h5>

            @if($media->isEmpty())
                <p class="text-muted">Tidak ada file.</p>
            @else
                <ul class="mb-3">
                    @foreach($media as $m)
                        <li>
                            <a href="{{ asset('uploads/kelahiran/'.$m->file_name) }}"
                               target="_blank">
                               <i class="bi bi-file-earmark-text"></i>
                               {{ $m->file_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

            {{-- Upload File Baru --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Upload File Baru (opsional)</label>
                <input type="file" name="files[]" class="form-control" multiple>
            </div>

            <div class="text-end">
                <a href="{{ route('kelahiran.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button class="btn btn-warning">
                    <i class="bi bi-save"></i> Update Data
                </button>
            </div>

        </form>

    </div>
</div>
@endsection

@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center fw-bold mb-4 text-warning">
        <i class="bi bi-pencil-square"></i> Edit Data Pindah
    </h2>

    <div class="card shadow-sm border-0 rounded-4 p-4">

        <form method="POST" action="{{ route('pindah.update', $pindah->pindah_id) }}"
              enctype="multipart/form-data">
            @csrf @method('PUT')

            {{-- Warga --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Warga</label>
                <select name="warga_id" class="form-select" required>
                    @foreach($warga as $w)
                        <option value="{{ $w->warga_id }}"
                            {{ $w->warga_id == $pindah->warga_id ? 'selected' : '' }}>
                            {{ $w->nama }} - {{ $w->nik }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Pindah</label>
                <input type="date" name="tgl_pindah" class="form-control"
                       value="{{ $pindah->tgl_pindah }}" required>
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Alamat Tujuan</label>
                <input type="text" name="alamat_tujuan" class="form-control"
                       value="{{ $pindah->alamat_tujuan }}" required>
            </div>

            {{-- Alasan --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Alasan</label>
                <input type="text" name="alasan" class="form-control"
                       value="{{ $pindah->alasan }}">
            </div>

            {{-- No Surat --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">No Surat</label>
                <input type="text" name="no_surat" class="form-control"
                       value="{{ $pindah->no_surat }}" required>
            </div>

            {{-- File Lama --}}
            <h5 class="fw-bold mb-2">File Lampiran Lama</h5>

            @if($media->isEmpty())
                <p class="text-muted">Tidak ada file.</p>
            @else
                <ul class="mb-3">
                    @foreach($media as $m)
                        <li>
                            <a href="{{ asset('uploads/pindah/'.$m->file_name) }}"
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
                <label class="form-label fw-semibold">Upload File Baru (Opsional)</label>
                <input type="file" name="files[]" class="form-control" multiple>
            </div>

            <div class="text-end">
                <a href="{{ route('pindah.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button class="btn btn-warning"><i class="bi bi-save"></i> Update</button>
            </div>

        </form>

    </div>

</div>
@endsection

@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold text-primary mb-4 text-center">
        <i class="bi bi-box-arrow-right"></i> Detail Peristiwa Pindah
    </h2>

    <div class="card shadow-sm p-4 border-0 rounded-4">

        <h5 class="fw-bold text-primary mb-3">Informasi Pindah</h5>

        <p><strong>Nama Warga:</strong> {{ $pindah->warga->nama }}</p>
        <p><strong>Tanggal Pindah:</strong> {{ $pindah->tgl_pindah }}</p>
        <p><strong>Alamat Tujuan:</strong> {{ $pindah->alamat_tujuan }}</p>
        <p><strong>Alasan:</strong> {{ $pindah->alasan }}</p>
        <p><strong>No Surat:</strong> {{ $pindah->no_surat }}</p>

        <hr>

        <h5 class="fw-bold text-primary mb-3">
            <i class="bi bi-files"></i> File Lampiran
        </h5>

        @if($media->isEmpty())
            <p class="text-muted">Tidak ada file yang diunggah.</p>
        @else
            <div class="row g-3">
                @foreach($media as $file)
                <div class="col-md-4">

                    @php
                        $ext = strtolower(pathinfo($file->file_name, PATHINFO_EXTENSION));
                        $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
                        $path = asset('uploads/pindah/'.$file->file_name);
                    @endphp

                    <div class="card shadow-sm border-0 rounded-4 p-2 h-100">

                        @if($isImage)
                            <img src="{{ $path }}" class="img-fluid rounded"
                                 style="height:180px;object-fit:cover;">
                        @else
                            <div class="text-center py-4">
                                <i class="bi bi-file-earmark-text fs-1 text-primary"></i>
                                <p class="small">{{ $file->file_name }}</p>
                            </div>
                        @endif

                        <div class="text-center pb-2">
                            <a href="{{ $path }}" target="_blank"
                               class="btn btn-primary btn-sm">
                               <i class="bi bi-box-arrow-up-right"></i> Lihat File
                            </a>
                        </div>

                    </div>

                </div>
                @endforeach
                <a href="{{ route('pindah.index') }}" class="btn btn-secondary mb-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
            </div>
        @endif

    </div>

</div>
@endsection

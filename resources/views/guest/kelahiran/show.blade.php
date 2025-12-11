@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold text-success mb-4 text-center">
        <i class="bi bi-baby"></i> Detail Peristiwa Kelahiran
    </h2>

    <div class="card shadow-sm p-4 border-0 rounded-4">

        <h5 class="fw-bold text-success mb-3">Informasi Kelahiran</h5>

        <p><strong>Nama Warga:</strong> {{ $kelahiran->warga->nama }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $kelahiran->tgl_lahir }}</p>
        <p><strong>Tempat Lahir:</strong> {{ $kelahiran->tempat_lahir }}</p>
        <p><strong>No Akta:</strong> {{ $kelahiran->no_akta }}</p>

        <p><strong>Ayah:</strong> {{ $kelahiran->ayah->nama ?? '-' }}</p>
        <p><strong>Ibu:</strong> {{ $kelahiran->ibu->nama ?? '-' }}</p>

        <hr>

        <h5 class="fw-bold mb-3 text-primary">
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
                $path = asset('uploads/kelahiran/'.$file->file_name);
                @endphp

                <div class="card shadow-sm border-0 rounded-4 p-2 h-100">

                    @if($isImage)
                    <img src="{{ $path }}" class="img-fluid rounded"
                        style="object-fit:cover;height:170px;">
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
            <a href="{{ route('kelahiran.index') }}" class="btn btn-secondary mb-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>

        </div>
        @endif

    </div>

</div>
@endsection
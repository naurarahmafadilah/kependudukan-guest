@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold text-danger mb-4 text-center">
        <i class="bi bi-emoji-dizzy-fill"></i> Detail Peristiwa Kematian
    </h2>

    <div class="card shadow-sm border-0 p-4 rounded-4">

        {{-- DETAIL DATA --}}
        <h5 class="fw-bold mb-3 text-danger">Informasi Kematian</h5>

        <p><strong>Nama Warga:</strong> {{ $kematian->warga->nama }}</p>
        <p><strong>Tanggal Meninggal:</strong> {{ $kematian->tgl_meninggal }}</p>
        <p><strong>Sebab:</strong> {{ $kematian->sebab }}</p>
        <p><strong>Lokasi:</strong> {{ $kematian->lokasi }}</p>
        <p><strong>No Surat:</strong> {{ $kematian->no_surat }}</p>

        <hr>

        {{-- FILE LAMPIRAN --}}
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
                $path = asset('uploads/kematian/' . $file->file_name);
                $ext = strtolower(pathinfo($file->file_name, PATHINFO_EXTENSION));
                $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp']);
                @endphp

                <div class="card border-0 shadow-sm h-100 rounded-4 p-2">

                    {{-- Jika file adalah gambar, tampilkan sebagai preview --}}
                    @if($isImage)
                    <img src="{{ $path }}"
                        alt="{{ $file->file_name }}"
                        class="img-fluid rounded-3"
                        style="height: 180px; object-fit: cover;">
                    @else
                    {{-- Jika file bukan gambar --}}
                    <div class="text-center py-4">
                        <i class="bi bi-file-earmark-text-fill fs-1 text-primary"></i>
                        <p class="small mt-2">{{ $file->file_name }}</p>
                    </div>
                    @endif

                    <div class="text-center mt-2 pb-2">
                        <a href="{{ $path }}" target="_blank" class="btn btn-primary btn-sm">
                            <i class="bi bi-box-arrow-up-right"></i> Lihat File
                        </a>
                    </div>

                </div>

            </div>
            @endforeach
            <a href="{{ route('kematian.index') }}" class="btn btn-secondary mb-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>

        @endif

    </div>

</div>
@endsection
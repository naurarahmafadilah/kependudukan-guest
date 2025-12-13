@extends('guest.layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold text-primary mb-4 text-center">
        <i class="bi bi-person-lines-fill"></i> Detail Data Warga
    </h2>

    <div class="card shadow-sm border-0 p-4 rounded-4">

        {{-- ================= DATA WARGA ================= --}}
        <h5 class="fw-bold mb-3 text-primary">Informasi Warga</h5>

        <p><strong>Nama:</strong> {{ $warga->nama }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $warga->jenis_kelamin }}</p>
        <p><strong>Agama:</strong> {{ $warga->agama }}</p>
        <p><strong>Pekerjaan:</strong> {{ $warga->pekerjaan }}</p>
        <p><strong>No. Telp:</strong> {{ $warga->telp }}</p>
        <p><strong>Email:</strong> {{ $warga->email }}</p>

        <hr>

        {{-- ================= ANGGOTA KELUARGA ================= --}}
        <h5 class="fw-bold mb-3 text-info">
            <i class="bi bi-people-fill"></i> Anggota Keluarga
        </h5>

        @if(!$warga->keluarga || $warga->keluarga->anggota->isEmpty())
        <p class="text-muted">Tidak ada data anggota keluarga.</p>
        @else
        <ul class="list-group list-group-flush">
            @foreach($warga->keluarga->anggota as $anggota)
            <li class="list-group-item d-flex justify-content-between">
                <span>{{ $anggota->warga->nama }}</span>
                <span class="text-muted">
                    ({{ $anggota->hubungan }})
                </span>
            </li>
            @endforeach
        </ul>
        @endif


        <hr>

        {{-- ================= PERISTIWA KELAHIRAN ================= --}}
        <h5 class="fw-bold mb-3 text-primary">
            <i class="bi bi-emoji-smile-fill"></i> Peristiwa Kelahiran
        </h5>

        @if($warga->kelahiran)
        <p><strong>Tanggal Lahir:</strong> {{ $warga->kelahiran->tgl_lahir }}</p>
        <p><strong>Tempat Lahir:</strong> {{ $warga->kelahiran->tempat_lahir }}</p>
        <p><strong>No Surat:</strong> {{ $warga->kelahiran->no_surat }}</p>
        @else
        <p class="text-muted">Data kelahiran belum tercatat.</p>
        @endif

        <hr>

        {{-- ================= PERISTIWA KEMATIAN ================= --}}
        <h5 class="fw-bold mb-3 text-danger">
            <i class="bi bi-emoji-dizzy-fill"></i> Peristiwa Kematian
        </h5>

        @if($warga->kematian)
        <p><strong>Tanggal Meninggal:</strong> {{ $warga->kematian->tgl_meninggal }}</p>
        <p><strong>Sebab:</strong> {{ $warga->kematian->sebab }}</p>
        <p><strong>Lokasi:</strong> {{ $warga->kematian->lokasi }}</p>
        <p><strong>No Surat:</strong> {{ $warga->kematian->no_surat }}</p>
        @else
        <p class="text-success">Status: Masih Hidup</p>
        @endif

        <hr>

        {{-- ================= PERISTIWA PINDAH ================= --}}
        <h5 class="fw-bold mb-3 text-warning">
            <i class="bi bi-truck"></i> Peristiwa Pindah Domisili
        </h5>

        @if($warga->pindah)
        <p><strong>Tanggal Pindah:</strong> {{ $warga->pindah->tgl_pindah }}</p>
        <p><strong>Alamat Tujuan:</strong> {{ $warga->pindah->alamat_tujuan }}</p>
        <p><strong>Alasan:</strong> {{ $warga->pindah->alasan }}</p>
        @else
        <p class="text-muted">Belum pernah pindah domisili.</p>
        @endif

        <hr>

        {{-- ================= BUTTON ================= --}}
        <div class="text-center">
            <a href="{{ route('warga.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>

    </div>

</div>
@endsection
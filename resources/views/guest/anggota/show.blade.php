@extends('guest.layouts.app')

@section('content')
<div class="container">
  <h3>Detail Anggota Keluarga</h3>

  <table class="table">
    <tr><th>ID</th><td>{{ $anggota->anggota_id }}</td></tr>
    <tr><th>KK Nomor</th><td>{{ $anggota->keluarga?->kk_nomor }}</td></tr>
    <tr><th>Warga</th><td>{{ $anggota->warga?->nama ?? $anggota->warga?->warga_id ?? '-' }}</td></tr>
    <tr><th>Hubungan</th><td>{{ $anggota->hubungan }}</td></tr>
  </table>

  <a href="{{ route('anggota-keluarga.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection

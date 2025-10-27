@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 text-primary fw-bold">Tambah Data Keluarga</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('kependudukan.store') }}" method="POST" class="card shadow p-4 border-0 rounded-4">
    @csrf

    <div class="mb-3">
      <label class="form-label">Nomor KK</label>
      <input type="text" name="kk_nomor" class="form-control" value="{{ old('kk_nomor') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Kepala Keluarga</label>
      <select name="kepala_keluarga_warga_id" class="form-select">
        <option value="">-- Pilih Warga --</option>
        @foreach($warga as $w)
          <option value="{{ $w->warga_id }}" {{ old('kepala_keluarga_warga_id') == $w->warga_id ? 'selected' : '' }}>
            {{ $w->nama }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Alamat</label>
      <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">RT</label>
        <input type="text" name="rt" class="form-control" value="{{ old('rt') }}">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">RW</label>
        <input type="text" name="rw" class="form-control" value="{{ old('rw') }}">
      </div>
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('kependudukan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
@endsection

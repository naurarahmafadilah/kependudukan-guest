@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 text-primary fw-bold">Tambah Data Warga</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('warga.store') }}" method="POST" class="card shadow p-4 border-0 rounded-4">
    @csrf

    <div class="mb-3">
      <label class="form-label">Nomor KTP</label>
      <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Nama Lengkap</label>
      <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-select">
        <option value="">-- Pilih --</option>
        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Agama</label>
      <input type="text" name="agama" class="form-control" value="{{ old('agama') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Pekerjaan</label>
      <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}">
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">No. Telepon</label>
        <input type="text" name="telp" class="form-control" value="{{ old('telp') }}">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
      </div>
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
@endsection

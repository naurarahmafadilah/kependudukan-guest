@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 text-primary fw-bold">Edit Data Warga</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST" class="card shadow p-4 border-0 rounded-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nomor KTP</label>
      <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp', $warga->no_ktp) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Nama Lengkap</label>
      <input type="text" name="nama" class="form-control" value="{{ old('nama', $warga->nama) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-select">
        <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Agama</label>
      <input type="text" name="agama" class="form-control" value="{{ old('agama', $warga->agama) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Pekerjaan</label>
      <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $warga->pekerjaan) }}">
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">No. Telepon</label>
        <input type="text" name="telp" class="form-control" value="{{ old('telp', $warga->telp) }}">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $warga->email) }}">
      </div>
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-warning">Perbarui</button>
      <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
@endsection

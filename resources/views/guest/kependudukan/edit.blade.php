@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 text-primary fw-bold">Edit Data Keluarga</h2>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('keluarga.update', $keluarga->kk_id) }}" method="POST" class="card shadow p-4 border-0 rounded-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nomor KK</label>
      <input type="text" name="kk_nomor" class="form-control" value="{{ old('kk_nomor', $keluarga->kk_nomor) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Kepala Keluarga</label>
      <select name="kepala_keluarga_warga_id" class="form-select">
        @foreach($warga as $w)
          <option value="{{ $w->warga_id }}" {{ $keluarga->kepala_keluarga_warga_id == $w->warga_id ? 'selected' : '' }}>
            {{ $w->nama }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Alamat</label>
      <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $keluarga->alamat) }}">
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">RT</label>
        <input type="text" name="rt" class="form-control" value="{{ old('rt', $keluarga->rt) }}">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">RW</label>
        <input type="text" name="rw" class="form-control" value="{{ old('rw', $keluarga->rw) }}">
      </div>
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-warning">Perbarui</button>
      <a href="{{ route('keluarga.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>
@endsection

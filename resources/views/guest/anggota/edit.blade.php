@extends('guest.layouts.app')

@section('content')
<div class="container">
  <h3>Edit Anggota</h3>

  @if($errors->any()) 
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('anggota-keluarga.update', $anggota) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
      <label>KK</label>
      <select name="kk_id" class="form-control" required>
        @foreach($keluargas as $k)
          <option value="{{ $k->kk_id }}" 
            {{ $anggota->kk_id == $k->kk_id ? 'selected':'' }}>
            {{ $k->kk_nomor }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Warga (opsional)</label>
      <select name="warga_id" class="form-control">
        <option value="">-- Pilih Warga --</option>
        @foreach($wargas as $w)
          <option value="{{ $w->warga_id }}" 
            {{ $anggota->warga_id == $w->warga_id ? 'selected':'' }}>
            {{ $w->nama ?? $w->warga_id }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label>Hubungan</label>
      <input type="text" name="hubungan" class="form-control" value="{{ $anggota->hubungan }}">
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('anggota-keluarga.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection

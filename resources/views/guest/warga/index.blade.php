@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 fw-bold text-primary">
    <i class="bi bi-person-lines-fill"></i> Data Warga
  </h2>

  {{-- Flash message --}}
  @if (session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
  @endif

  {{-- Tombol tambah --}}
  <div class="text-end mb-4">
    <a href="{{ route('warga.create') }}" class="btn btn-primary shadow-sm">
      <i class="bi bi-plus-circle"></i> Tambah Data Warga
    </a>
  </div>

  {{-- Tampilkan Data dalam bentuk Card --}}
  @if($warga->isEmpty())
  <div class="alert alert-warning text-center">Belum ada data warga.</div>
  @else
  <div class="row g-4">
    @foreach($warga as $item)
    <div class="col-md-4 col-sm-6">
      <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
        <div class="card-body p-4">
          <h5 class="card-title text-primary fw-bold mb-3">
            <i class="bi bi-person-circle"></i> {{ $item->nama }}
          </h5>
          <p class="card-text mb-1"><i class="bi bi-person-badge"></i> <strong>No KTP:</strong> {{ $item->no_ktp }}</p>
          <p class="card-text mb-1"><i class="bi bi-gender-ambiguous"></i> <strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</p>
          <p class="card-text mb-1"><i class="bi bi-bookmark-heart"></i> <strong>Agama:</strong> {{ $item->agama }}</p>
          <p class="card-text mb-1"><i class="bi bi-briefcase"></i> <strong>Pekerjaan:</strong> {{ $item->pekerjaan }}</p>
          <p class="card-text mb-1"><i class="bi bi-telephone"></i> <strong>Telp:</strong> {{ $item->telp }}</p>
          <p class="card-text"><i class="bi bi-envelope"></i> <strong>Email:</strong> {{ $item->email }}</p>
        </div>
        <div class="card-footer bg-light border-0 d-flex justify-content-between px-4 py-3">
          <a href="{{ route('warga.edit', $item) }}" class="btn btn-sm btn-warning">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
          <form action="{{ route('warga.destroy', $item) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
              <i class="bi bi-trash"></i> Hapus
            </button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endif
</div>
@endsection

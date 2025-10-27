@extends('guest.layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4 fw-bold text-success">
    <i class="bi bi-house-door"></i> Keluarga KK
  </h2>

  {{-- Flash message --}}
  @if (session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
  @endif

  {{-- Tombol tambah --}}
  <div class="text-end mb-4">
    <a href="{{ route('kependudukan.create') }}" class="btn btn-success">
      <i class="bi bi-plus-circle"></i> Tambah Data KK
    </a>
  </div>

  {{-- Jika data kosong --}}
  @if($keluarga->isEmpty())
    <div class="alert alert-warning text-center">Belum ada data keluarga.</div>
  @else
    <div class="row g-4">
      @foreach($keluarga as $item)
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 rounded-3">
            <div class="card-body">
              <h5 class="card-title text-success fw-bold mb-3">
                <i class="bi bi-house"></i> No. KK: 
                <span class="text-dark">{{ $item->no_kk ?? '-' }}</span>
              </h5>
              
              <p class="card-text mb-2">
                <i class="bi bi-person-circle"></i> 
                <strong>Kepala Keluarga:</strong> {{ $item->kepalaKeluarga->nama ?? '-' }}
              </p>

              <p class="card-text mb-2">
                <i class="bi bi-geo-alt"></i> 
                <strong>Alamat:</strong> {{ $item->alamat ?? '-' }}
              </p>

              <p class="card-text mb-3">
                <i class="bi bi-signpost-split"></i> 
                <strong>RT/RW:</strong> {{ $item->rt ?? '-' }}/{{ $item->rw ?? '-' }}
              </p>

              {{-- Tombol aksi --}}
              <div class="d-flex justify-content-between">
                <a href="{{ route('kependudukan.edit', $item) }}" class="btn btn-warning btn-sm">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>

                <form action="{{ route('kependudukan.destroy', $item) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                    <i class="bi bi-trash"></i> Hapus
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection

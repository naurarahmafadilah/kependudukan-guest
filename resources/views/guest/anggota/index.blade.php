@extends('guest.layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4 fw-bold text-success">
            <i class="bi bi-people"></i> Anggota Keluarga
        </h2>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol tambah --}}
        <div class="text-end mb-4">
            <a href="{{ route('anggota-keluarga.create') }}" class="btn btn-success shadow-sm">
                <i class="bi bi-plus-circle"></i> Tambah Anggota
            </a>
        </div>

        <form method="GET" action="{{ route('anggota-keluarga.index') }}" class="row g-2 mb-3">
            <div class="col-md-2">
                <select name="kk_id" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua KK</option>
                    @foreach ($keluargaList ?? [] as $kk)
                        <option value="{{ $kk->kk_id }}" {{ request('kk_id') == $kk->kk_id ? 'selected' : '' }}>
                            {{ $kk->kk_nomor }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>

                    @if (request('search') || request('kk_id'))
                        <a href="{{ route('anggota-keluarga.index') }}" class="btn btn-outline-danger ms-2">Clear</a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Data dalam bentuk Card --}}
        @if ($anggota->isEmpty())
            <div class="alert alert-warning text-center">Belum ada data anggota keluarga.</div>
        @else
            <div class="row g-4">
                @foreach ($anggota as $item)
                    <div class="col-md-4 col-sm-6">
                        <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                            <div class="card-body p-4">
                                <h5 class="card-title text-success fw-bold mb-3">
                                    <i class="bi bi-person-circle"></i>
                                    {{ $item->warga->nama ?? 'Anggota #' . $item->anggota_id }}
                                </h5>

                                <p class="card-text mb-1">
                                    <i class="bi bi-diagram-3"></i>
                                    <strong>Hubungan:</strong> {{ $item->hubungan ?? '-' }}
                                </p>

                                <p class="card-text mb-1">
                                    <i class="bi bi-house-door"></i>
                                    <strong>No. KK:</strong> {{ $item->keluarga->kk_nomor ?? '-' }}
                                </p>

                                <p class="card-text mb-1">
                                    <i class="bi bi-geo-alt"></i>
                                    <strong>Alamat KK:</strong> {{ $item->keluarga->alamat ?? '-' }}
                                </p>

                                <p class="card-text mb-1">
                                    <i class="bi bi-person-badge"></i>
                                    <strong>No KTP:</strong> {{ $item->warga->no_ktp ?? '-' }}
                                </p>

                                <p class="card-text mb-1">
                                    <i class="bi bi-gender-ambiguous"></i>
                                    <strong>Jenis Kelamin:</strong> {{ $item->warga->jenis_kelamin ?? '-' }}
                                </p>

                                <p class="card-text mb-1">
                                    <i class="bi bi-bookmark-heart"></i>
                                    <strong>Agama:</strong> {{ $item->warga->agama ?? '-' }}
                                </p>

                                <p class="card-text mb-1">
                                    <i class="bi bi-briefcase"></i>
                                    <strong>Pekerjaan:</strong> {{ $item->warga->pekerjaan ?? '-' }}
                                </p>

                                <p class="card-text mb-1">
                                    <i class="bi bi-telephone"></i>
                                    <strong>Telp:</strong> {{ $item->warga->telp ?? '-' }}
                                </p>

                                <p class="card-text">
                                    <i class="bi bi-envelope"></i>
                                    <strong>Email:</strong> {{ $item->warga->email ?? '-' }}
                                </p>
                            </div>

                            <div class="card-footer bg-light border-0 d-flex justify-content-between px-4 py-3">
                                <a href="{{ route('anggota-keluarga.show', $item) }}"
                                    class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i> Detail
                                </a>

                                <a href="{{ route('anggota-keluarga.edit', $item) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ route('anggota-keluarga.destroy', $item) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data anggota ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                    <div>
                        {{ $anggota->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif
    </div>
@endsection

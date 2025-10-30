@extends('guest.layouts.app')

@section('content')
<div class="main-content">
    <div class="container text-center">
        <h1 class="mb-4">🌿 Layanan Kami</h1>
        <p class="lead mb-5">
            Bina Desa menyediakan berbagai layanan untuk mendukung administrasi kependudukan dan kesejahteraan warga desa.
            Semua data dikelola dengan transparan, aman, dan mudah diakses.
        </p>

        <div class="row justify-content-center">
            <!-- Data Keluarga -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="https://source.unsplash.com/400x250/?family,community"
                         class="card-img-top"
                         alt="Data Keluarga">
                    <div class="card-body text-start">
                        <h5 class="card-title"><i class="fas fa-seedling text-success"></i> Data Keluarga</h5>
                        <p class="card-text">
                            Layanan untuk mengelola informasi keluarga seperti kepala keluarga, jumlah anggota, dan hubungan antaranggota.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Data Warga -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="https://source.unsplash.com/400x250/?people,education"
                         class="card-img-top"
                         alt="Data Warga">
                    <div class="card-body text-start">
                        <h5 class="card-title"><i class="fas fa-graduation-cap text-primary"></i> Data Warga</h5>
                        <p class="card-text">
                            Menyimpan data detail penduduk desa seperti usia, pekerjaan, pendidikan, dan status pernikahan untuk keperluan perencanaan pembangunan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Data Kematian -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="https://source.unsplash.com/400x250/?memorial,peace"
                         class="card-img-top"
                         alt="Data Kematian">
                    <div class="card-body text-start">
                        <h5 class="card-title"><i class="fas fa-hand-holding-heart text-danger"></i> Data Kematian</h5>
                        <p class="card-text">
                            Fitur untuk mencatat dan mengelola informasi warga yang telah meninggal agar data kependudukan selalu mutakhir dan akurat.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h3 class="mb-3">🎯 Tujuan Layanan</h3>
            <p class="mb-4">
                Setiap layanan di Bina Desa dirancang untuk mendukung transparansi data, efisiensi administrasi,
                dan kemudahan akses informasi bagi seluruh masyarakat desa.
            </p>
            <img src="https://source.unsplash.com/1000x400/?village,teamwork"
                 alt="Tujuan Bina Desa"
                 style="width: 100%; border-radius: 10px;">
        </div>
    </div>
</div>
@endsection

@extends('guest.layouts.app')

@section('content')
<div class="about-container text-center container">

    <!-- Judul Utama -->
    <h1 class="mb-4 fw-bold text-dark">Layanan <span>Bina Desa</span></h1>

    <p class="lead mb-5 text-secondary mx-auto" style="max-width: 850px;">
        Bina Desa menyediakan berbagai layanan untuk mendukung administrasi kependudukan dan kesejahteraan warga desa.
        Seluruh sistem layanan ini dikelola dengan prinsip transparansi, keamanan, dan kemudahan akses bagi masyarakat.
    </p>

    <!-- Gambar Utama -->
    <img src="{{ asset('assets-guest/img/layanan.jpg') }}"
         alt="Layanan Bina Desa"
         class="img-fluid fancy-img mb-5"
         style="max-height: 450px;">

    <!-- Jenis Layanan -->
    <h3 class="fw-semibold text-primary mb-4">
        <i class="bi bi-gear-wide-connected me-2"></i> Jenis Layanan Kami
    </h3>

    <div class="row text-start justify-content-center">
        <!-- Data Keluarga -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle"><i class="bi bi-house-heart-fill"></i></div>
                        <h5 class="card-title text-primary fw-semibold mb-0">Data Keluarga</h5>
                    </div>
                    <p class="card-text text-secondary mt-2">
                        Layanan untuk mengelola data keluarga seperti kepala keluarga, jumlah anggota, dan hubungan antaranggota agar data kependudukan selalu akurat.
                    </p>
                </div>
            </div>
        </div>

        <!-- Data Warga -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle"><i class="bi bi-person-lines-fill"></i></div>
                        <h5 class="card-title text-primary fw-semibold mb-0">Data Warga</h5>
                    </div>
                    <p class="card-text text-secondary mt-2">
                        Menyimpan data detail penduduk desa seperti usia, pekerjaan, pendidikan, dan status pernikahan. Data ini menjadi dasar perencanaan pembangunan desa.
                    </p>
                </div>
            </div>
        </div>

        <!-- Data Kematian -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle"><i class="bi bi-heartbreak-fill"></i></div>
                        <h5 class="card-title text-primary fw-semibold mb-0">Data Kematian</h5>
                    </div>
                    <p class="card-text text-secondary mt-2">
                        Fitur untuk mencatat dan mengelola data warga yang telah meninggal dunia agar data kependudukan desa selalu mutakhir dan valid.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gambar Pendukung -->
    <h3 class="fw-semibold text-primary mb-3">
        <i class="bi bi-bullseye me-2"></i> Tujuan Utama Layanan
    </h3>

    <img src="{{ asset('assets-guest/img/tujuan.jpg') }}"
         alt="Tujuan Layanan"
         class="img-fluid fancy-img mb-4"
         style="max-height: 420px;">

    <p class="text-secondary mx-auto" style="max-width: 850px;">
        Setiap layanan Bina Desa dirancang untuk mempermudah administrasi, meningkatkan transparansi data,
        serta mendukung partisipasi masyarakat dalam pembangunan desa yang berkelanjutan dan sejahtera.
    </p>

</div>
@endsection

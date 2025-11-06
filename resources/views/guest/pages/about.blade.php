@extends('guest.layouts.app')

@section('content')
<style>

</style>

<div class="about-container text-center container">

    <!-- Judul Utama -->
    <h1 class="mb-4 fw-bold text-dark">Tentang <span>Bina Desa</span></h1>

    <p class="lead mb-5 text-secondary mx-auto" style="max-width: 850px;">
        Bina Desa merupakan program pengembangan masyarakat yang berfokus pada peningkatan kesejahteraan warga desa
        melalui edukasi, inovasi, dan kolaborasi antara pemerintah, masyarakat, serta mahasiswa.
        Program ini menjadi wujud nyata kontribusi akademik terhadap pembangunan berkelanjutan di tingkat desa.
    </p>

    <!-- Gambar Utama -->
    <img src="{{ asset('assets-guest/img/desa.jpg') }}"
         alt="Kegiatan Bina Desa"
         class="img-fluid fancy-img mb-5"
         style="max-height: 450px;">

    <!-- Tujuan Program -->
    <h3 class="fw-semibold text-primary mb-3">
        <i class="bi bi-bullseye me-2"></i> Tujuan Utama Program
    </h3>

    <p class="text-muted mb-4 mx-auto" style="max-width: 900px;">
        Program ini bertujuan untuk membantu masyarakat desa dalam meningkatkan pengetahuan dan kemampuan
        melalui pelatihan berkelanjutan, penerapan teknologi, dan penguatan kolaborasi lintas sektor.
    </p>

    <ul class="mx-auto" style="max-width: 800px;">
        <li><i class="bi bi-check-circle-fill"></i>Meningkatkan kapasitas masyarakat dalam mengelola potensi lokal.</li>
        <li><i class="bi bi-check-circle-fill"></i>Menumbuhkan semangat inovasi dan kemandirian di desa.</li>
        <li><i class="bi bi-check-circle-fill"></i>Menjalin kemitraan antara mahasiswa, masyarakat, dan pemerintah.</li>
        <li><i class="bi bi-check-circle-fill"></i>Mendorong terciptanya lingkungan desa yang berdaya dan berkelanjutan.</li>
    </ul>

    <!-- Gambar Pendukung -->
    <img src="{{ asset('assets-guest/img/tentang.jpg') }}"
         alt="Kegiatan Pelatihan"
         class="img-fluid fancy-img my-5"
         style="max-height: 420px;">

    <!-- Modul Kegiatan -->
    <h3 class="fw-semibold text-primary mb-4">
        <i class="bi bi-grid-1x2-fill me-2"></i> Modul Kegiatan
    </h3>

    <div class="row text-start justify-content-center">
        <!-- Modul Edukasi -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle"><i class="bi bi-journal-bookmark-fill"></i></div>
                        <h5 class="card-title text-primary fw-semibold mb-0">Modul Edukasi</h5>
                    </div>
                    <p class="card-text text-secondary mt-2">
                        Memberikan pelatihan kepada masyarakat agar mampu mandiri dalam mengelola potensi lokal
                        secara berkelanjutan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Modul Inovasi -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle"><i class="bi bi-lightbulb-fill"></i></div>
                        <h5 class="card-title text-primary fw-semibold mb-0">Modul Inovasi</h5>
                    </div>
                    <p class="card-text text-secondary mt-2">
                        Memperkenalkan inovasi dan teknologi baru untuk meningkatkan produktivitas masyarakat
                        dan efisiensi pembangunan desa.
                    </p>
                </div>
            </div>
        </div>

        <!-- Modul Kolaborasi -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle"><i class="bi bi-people-fill"></i></div>
                        <h5 class="card-title text-primary fw-semibold mb-0">Modul Kolaborasi</h5>
                    </div>
                    <p class="card-text text-secondary mt-2">
                        Mendorong kolaborasi aktif antara masyarakat, mahasiswa, dan pemerintah
                        untuk menciptakan desa yang tangguh dan berdaya saing.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gambar Akhir -->
    <h3 class="fw-semibold text-primary mb-3">
        <i class="bi bi-diagram-3 me-2"></i> Alur Pelaksanaan
    </h3>

    <img src="{{ asset('assets-guest/img/alur.jpg') }}"
         alt="Alur Pelaksanaan"
         class="img-fluid fancy-img mb-4"
         style="max-height: 420px;">

    <p class="text-secondary mx-auto" style="max-width: 850px;">
        Setiap modul dijalankan secara bertahap — mulai dari perencanaan, pelatihan, implementasi hingga evaluasi.
        Proses ini memastikan kegiatan Bina Desa memberikan dampak nyata dan berkelanjutan bagi masyarakat.
    </p>

</div>
@endsection

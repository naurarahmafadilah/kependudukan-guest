@extends('guest.layouts.app')

@section('content')
<div class="main-content">
    <div class="container text-center">
        <h1 class="mb-4">Tentang Bina Desa</h1>
        <p class="lead mb-4">
            Bina Desa adalah program pengembangan masyarakat yang berfokus pada peningkatan kesejahteraan warga desa
            melalui edukasi, inovasi, dan kolaborasi antara pemerintah, masyarakat, serta mahasiswa.
        </p>

        <img src="https://source.unsplash.com/900x400/?village,community"
             alt="Kegiatan Bina Desa"
             style="width: 100%; border-radius: 10px; margin-bottom: 40px;">

        <h3 class="mb-3">🎯 Tujuan Utama Program</h3>
        <p>
            Program ini bertujuan untuk membantu masyarakat desa dalam meningkatkan pengetahuan dan kemampuan
            melalui berbagai modul pelatihan serta implementasi teknologi tepat guna.
        </p>

        <h3 class="mt-5 mb-3">📘 Modul Kegiatan</h3>
        <div class="row text-start justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="https://source.unsplash.com/400x250/?education,training" class="card-img-top" alt="Modul Edukasi">
                    <div class="card-body">
                        <h5 class="card-title">Modul Edukasi</h5>
                        <p class="card-text">Memberikan pelatihan dan edukasi kepada masyarakat desa agar mampu mandiri dalam mengelola potensi lokal.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="https://source.unsplash.com/400x250/?technology,innovation" class="card-img-top" alt="Modul Inovasi">
                    <div class="card-body">
                        <h5 class="card-title">Modul Inovasi</h5>
                        <p class="card-text">Memperkenalkan teknologi dan inovasi untuk membantu produktivitas masyarakat dan mempercepat digitalisasi desa.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="https://source.unsplash.com/400x250/?community,collaboration" class="card-img-top" alt="Modul Kolaborasi">
                    <div class="card-body">
                        <h5 class="card-title">Modul Kolaborasi</h5>
                        <p class="card-text">Mendorong kerja sama antara masyarakat, mahasiswa, dan pihak pemerintah untuk menciptakan lingkungan desa yang berdaya.</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-5 mb-3">🔄 Alur Pelaksanaan</h3>
        <img src="https://source.unsplash.com/900x350/?workflow,process"
             alt="Alur Program"
             style="width: 100%; border-radius: 10px; margin-bottom: 30px;">
        <p>
            Setiap modul dijalankan secara bertahap — mulai dari perencanaan, pelatihan, implementasi, hingga evaluasi.
            Proses ini memastikan bahwa kegiatan Bina Desa memberikan dampak nyata bagi masyarakat.
        </p>
    </div>
</div>
@endsection

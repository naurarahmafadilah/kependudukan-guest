@extends('guest.layouts.app')

@section('content')
<div class="main-content">
    <div class="container text-center">
        <h1 class="mb-4">Selamat Datang di <span class="text-primary">Nusa Data</span></h1>
        <p class="lead mb-4">
            Website ini menjadi media informasi dan data kependudukan, serta memperkenalkan kegiatan dan layanan yang ada di Bina Desa.
            Kami berkomitmen untuk membantu masyarakat desa melalui teknologi, edukasi, dan inovasi berkelanjutan.
        </p>

        <img src="https://source.unsplash.com/1000x450/?village,nature"
             alt="Gambaran Desa"
             style="width: 100%; border-radius: 10px; margin-bottom: 50px;">

        <h3 class="mb-4">🌿 Layanan Utama Kami</h3>
        <div class="row text-start justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="https://source.unsplash.com/400x250/?family,people" class="card-img-top" alt="Data Keluarga">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-seedling text-success"></i> Data Keluarga</h5>
                        <p class="card-text">Menampilkan data dan informasi keluarga secara akurat untuk mendukung perencanaan pembangunan desa.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fidn.freepik.com%2Fikon%2Finfo-icon_64159&psig=AOvVaw3wLlCpAtSuNN8Jt0d7gYMU&ust=1761876433366000&source=images&cd=vfe&opi=89978449&ved=0CBUQjRxqFwoTCJCZ9anrypADFQAAAAAdAAAAABAE" class="card-img-top" alt="Data Warga">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-graduation-cap text-primary"></i> Data Warga</h5>
                        <p class="card-text">Memuat informasi lengkap tentang penduduk desa, termasuk usia, pendidikan, dan pekerjaan.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <img src="https://source.unsplash.com/400x250/?memorial,flowers" class="card-img-top" alt="Data Kematian">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-hand-holding-heart text-danger"></i> Data Kematian</h5>
                        <p class="card-text">Menyediakan informasi mengenai data kematian warga desa yang dikelola secara aman dan transparan.</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-5 mb-3">💡 Tujuan Utama</h3>
        <p>
            Bina Desa hadir sebagai solusi digital untuk memperkuat sistem administrasi kependudukan, mempercepat layanan publik,
            dan menciptakan desa yang cerdas dan berdaya.
        </p>
    </div>
</div>
@endsection

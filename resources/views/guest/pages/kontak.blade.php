@extends('guest.layouts.app')

@section('content')
<div class="about-container text-center container">

    <!-- Judul Utama -->
    <h1 class="mb-4 fw-bold text-dark">Kontak <span>Nusa Data</span></h1>

    <p class="lead mb-5 text-secondary mx-auto" style="max-width: 850px;">
        Kami siap membantu Anda! Hubungi tim <strong>Nusa Data</strong> untuk pertanyaan, saran, atau kerja sama.
        Semua layanan komunikasi kami terbuka untuk masyarakat yang ingin berkontribusi dalam pembangunan desa.
    </p>

    <!-- Gambar Utama -->
    <img src="{{ asset('assets-guest/img/kontak.jpg') }}"
         alt="Kontak Bina Desa"
         class="img-fluid fancy-img mb-5"
         style="max-height: 450px; border-radius: 16px; box-shadow: 0 8px 25px rgba(13, 110, 253, 0.25);">

    <!-- Informasi Kontak -->
    <h3 class="fw-semibold text-primary mb-4">
        <i class="bi bi-telephone-inbound-fill me-2"></i> Informasi Kontak
    </h3>

    <div class="row text-start justify-content-center">
        <!-- Alamat -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle bg-light text-primary"><i class="bi bi-geo-alt-fill"></i></div>
                        <h5 class="card-title text-primary fw-semibold mb-0">Alamat</h5>
                    </div>
                    <p class="card-text text-secondary mt-2">
                        Jl. Mawar No. 123, Pekanbaru, Riau
                        <br><small>Senin - Jumat: 08.00 - 16.00 WIB</small>
                    </p>
                </div>
            </div>
        </div>

        <!-- Telepon -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle bg-light text-success"><i class="bi bi-telephone-fill"></i></div>
                        <h5 class="card-title text-primary fw-semibold mb-0">Telepon</h5>
                    </div>
                    <p class="card-text text-secondary mt-2">
                        +62 812-3456-7890
                        <br><small>Layanan tersedia setiap hari kerja</small>
                    </p>
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="icon-circle bg-light text-danger"><i class="bi bi-envelope-fill"></i></div>
                        <h5 class="card-title text-primary fw-semibold mb-0">Email</h5>
                    </div>
                    <p class="card-text text-secondary mt-2">
                        info@binadesa.id
                        <br><small>Kami akan membalas dalam 1x24 jam</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Peta Lokasi -->
    <h3 class="fw-semibold text-primary mt-5 mb-4">
        <i class="bi bi-map-fill me-2"></i> Lokasi Kami
    </h3>

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15958.0812220771!2d101.4302225!3d0.5149446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aad32782a2c3%3A0x9ef0e7c69cc4e39f!2sPekanbaru!5e0!3m2!1sid!2sid!4v1671800000000!5m2!1sid!2sid"
        width="100%"
        height="400"
        style="border:0; border-radius: 15px; box-shadow: 0 8px 25px rgba(13, 110, 253, 0.25);"
        allowfullscreen=""
        loading="lazy">
    </iframe>

    <!-- Form Pesan -->
    <h3 class="fw-semibold text-primary mt-5 mb-4">
        <i class="bi bi-chat-dots-fill me-2"></i> Kirim Pesan
    </h3>

    <div class="text-start mx-auto" style="max-width: 600px;">
        <form>
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Alamat Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label fw-semibold">Pesan</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Tulis pesan Anda di sini"></textarea>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2">
                    <i class="bi bi-send-fill me-2"></i> Kirim Pesan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

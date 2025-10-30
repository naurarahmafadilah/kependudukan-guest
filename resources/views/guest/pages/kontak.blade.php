@extends('guest.layouts.app')

@section('content')
<div class="main-content">
    <div class="container text-center">
        <h1 class="mb-4">📬 Kontak Kami</h1>
        <p class="lead mb-5">
            Kami siap membantu Anda! Hubungi kami untuk pertanyaan, masukan, atau kerjasama dengan tim Bina Desa.
        </p>

        <div class="row justify-content-center mb-5">
            <!-- Alamat -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0 h-100 py-4">
                    <div class="card-body">
                        <i class="fas fa-map-marker-alt fa-2x text-primary mb-3"></i>
                        <h5 class="card-title">Alamat</h5>
                        <p class="card-text">Jl. Mawar No. 123, Pekanbaru</p>
                    </div>
                </div>
            </div>

            <!-- Telepon -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0 h-100 py-4">
                    <div class="card-body">
                        <i class="fas fa-phone-alt fa-2x text-success mb-3"></i>
                        <h5 class="card-title">Telepon</h5>
                        <p class="card-text">+62 812-3456-7890</p>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0 h-100 py-4">
                    <div class="card-body">
                        <i class="fas fa-envelope fa-2x text-danger mb-3"></i>
                        <h5 class="card-title">Email</h5>
                        <p class="card-text">info@binadesa.id</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Peta -->
        <div class="mb-5">
            <h4 class="mb-3">🗺️ Lokasi Kami</h4>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15958.0812220771!2d101.4302225!3d0.5149446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aad32782a2c3%3A0x9ef0e7c69cc4e39f!2sPekanbaru!5e0!3m2!1sid!2sid!4v1671800000000!5m2!1sid!2sid"
                width="100%"
                height="400"
                style="border:0; border-radius: 15px;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>

        <!-- Form Pesan -->
        <div class="text-start mx-auto" style="max-width: 600px;">
            <h4 class="mb-3 text-center">💌 Kirim Pesan</h4>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Tulis pesan Anda di sini"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4 py-2">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

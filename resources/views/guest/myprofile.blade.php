@extends('guest.layouts.app')

@section('content')

<style>
    body {
        background: #f5f7fb !important;
    }

    .dev-container {
        display: flex;
        justify-content: center;
        padding: 50px 20px;
    }

    .dev-card {
        background: #ffffff;
        width: 480px;
        padding: 40px 35px;
        border-radius: 22px;
        text-align: center;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        transition: .3s;
    }

    .dev-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 35px rgba(0, 0, 0, 0.12);
    }

    .dev-photo {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid #eef2ff;
        box-shadow: 0 6px 18px rgba(0,0,0,0.12);
        margin-bottom: 20px;
    }

    .dev-name {
        font-size: 1.9rem;
        font-weight: 800;
        color: #1a2a5a;
        margin-bottom: 8px;
    }

    .dev-text {
        font-size: 1.05rem;
        color: #3a4667;
        margin-bottom: 4px;
        font-weight: 600;
    }

    .divider {
        height: 1.2px;
        background: #d7ddeb;
        width: 100%;
        margin: 25px auto;
    }

    .social-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #1a2a5a;
        margin-bottom: 10px;
    }

    .social-icons a {
        font-size: 32px;
        margin: 0 12px;
        color: #1a2a5a;
        transition: .25s;
    }

    .social-icons a:hover {
        color: #0066ff;
        transform: translateY(-5px);
    }
</style>

<div class="dev-container">
    <div class="dev-card">

        {{-- FOTO NAURA --}}
        <img src="{{ asset('assets-guest/img/naura.jpeg') }}" class="dev-photo" alt="Foto Naura">

        {{-- IDENTITAS --}}
        <div class="dev-name">Naura Rahma Fadilah</div>

        <div class="dev-text"><strong>NIM:</strong> 2457301111</div>
        <div class="dev-text"><strong>Prodi:</strong> Sistem Informasi</div>

        <div class="divider"></div>

        {{-- SOSIAL MEDIA --}}
        <div class="social-title">Social Media</div>

        <div class="social-icons">
            <a href="https://linkedin.com" target="_blank"><i class="bi bi-linkedin"></i></a>
            <a href="https://github.com" target="_blank"><i class="bi bi-github"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
        </div>

    </div>
</div>

@endsection

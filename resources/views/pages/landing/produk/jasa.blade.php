@extends('layouts.landing')

@section('title')
Beranda
@endsection

@push('before-script')
@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@section('content')
<section class="section section-lg pb-0" id="services">
    <div class="container">
        <!-- Computer and Laptop Service Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-10 text-center">
                <h2 class="display-4 mb-4 animate__animated animate__fadeInDown">Jasa Servis Komputer dan Laptop</h2>
                <p class="lead">Kami menawarkan berbagai layanan servis untuk memastikan komputer dan laptop Anda berfungsi optimal.</p>
            </div>
        </div>
        <div class="row justify-content-center bg-light bg-gradient">
            <div class="col-md-6 col-sm-12 text-left mb-4">
                <div class="service-box p-4 animate__animated animate__fadeInLeft">
                    <h4 class="mb-3">Diagnosa Masalah</h4>
                    <p>Kami akan melakukan diagnosa lengkap untuk mengetahui permasalahan pada komputer atau laptop Anda.</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-left mb-4">
                <div class="service-box p-4 animate__animated animate__fadeInRight">
                    <h4 class="mb-3">Perbaikan dan Pemeliharaan</h4>
                    <p>Kami menawarkan layanan perbaikan untuk berbagai masalah hardware dan software pada komputer atau laptop.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <!-- Installation Service Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-10 text-center">
                <h2 class="display-4 mb-4 animate__animated animate__fadeInDown">Jasa Instalasi</h2>
                <p class="lead">Layanan instalasi profesional untuk berbagai perangkat lunak dan perangkat keras pada komputer dan laptop.</p>
            </div>
        </div>
        <div class="row justify-content-center bg-light bg-gradient">
            <div class="col-md-6 col-sm-12 text-left mb-4">
                <div class="service-box p-4 animate__animated animate__fadeInLeft">
                    <h4 class="mb-3">Instalasi Software</h4>
                    <p>Kami membantu menginstal berbagai jenis software untuk kebutuhan pribadi maupun bisnis pada komputer dan laptop.</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-left mb-4">
                <div class="service-box p-4 animate__animated animate__fadeInRight">
                    <h4 class="mb-3">Instalasi Hardware</h4>
                    <p>Kami menawarkan layanan instalasi hardware seperti pemasangan komponen komputer, jaringan, dan lain-lain pada komputer dan laptop.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <!-- Form Section -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="display-4 mb-4 text-center animate__animated animate__fadeInDown">Formulir Pengajuan Jasa</h2>
                <form action="{{ route('jasa') }}" method="POST" class="animate__animated animate__fadeInUp">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="service_type">Jenis Layanan</label>
                        <select class="form-control" id="service_type" name="service_type" required>
                            <option value="Servis Komputer">Servis Komputer</option>
                            <option value="Servis Laptop">Servis Laptop</option>
                            <option value="Instalasi Software">Instalasi Software</option>
                            <option value="Instalasi Hardware">Instalasi Hardware</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Masalah</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('before-script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/assets/js/babeng.js')}}"></script>
<script src="{{asset('/assets/js/landingProduk.js')}}"></script>
@endpush

<style>
    .service-box {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .service-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .service-box {
            text-align: center;
        }
    }
</style>

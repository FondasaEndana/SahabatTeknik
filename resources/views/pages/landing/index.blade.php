@extends('layouts.landing')

@section('title')
Beranda
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}" />
@endif
@endpush

@section('content')

<div class="b-example-divider"></div>

@push('before-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>
    .c-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        filter: brightness(0.6);
    }

    .owl-carousel .item {
        position: relative;
        overflow: hidden;
    }

    .owl-carousel .item img {
        width: 100%;
    }

    .owl-carousel .item .carousel-caption {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        width: 100%;
        padding: 20px;
        color: #fff;
    }

    .owl-carousel .item img {
        width: 100%;
        height: 600px;
        /* Adjust this value as needed */
    }

    .owl-nav button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        border: none;
        color: #fff;
        padding: 10px;
        cursor: pointer;
    }

    .owl-nav .owl-prev {
        left: 10px;
    }

    .owl-nav .owl-next {
        right: 10px;
    }

    .owl-nav button:hover {
        background: rgba(0, 0, 0, 0.7);
    }


    .carousel-item img {
        height: 600px;
        width: 100%;
        object-fit: cover;
    }

    .fade-in {
        opacity: 0;
        transition: opacity 1s;
    }

    .fade-in.visible {
        opacity: 1;
    }

    .logos {
        display: flex;
    }

    .logo {
        margin: 0 10px;
    }
</style>

@endpush

<section class="pt-6 pb-2">
    <div class="overflow-hidden">
        <div class="container-fluid col-xl-8">
            <div class="row flex-lg-nowrap align-items-center g-5">
                <div class="order-lg-1 w-100">
                    <img style="clip-path: polygon(25% 0%, 100% 0%, 100% 99%, 0% 100%);" src="{{ asset('/') }}assets/img/BG_SahabatTeknik2.png" class="d-block mx-lg-auto img-fluid" alt="Photo by Milad Fakurian" loading="lazy" srcset="{{ asset('/') }}assets/img/BG_SahabatTeknik3.png" sizes="(max-width: 1080px) 100vw, 1080px" width="2160" height="768">
                </div>
                <div class="col-lg-6 col-xl-5 text-center text-lg-start pt-lg-5 mt-xl-2">
                    <div class="lc-block mb-4">
                        <div editable="rich">
                            <h1 class="fw-bold display-3">Tentang Toko Sahabat Teknik Komputer</h1>
                        </div>
                    </div>

                    <div class="lc-block mb-5">
                        <div editable="rich">
                            <p class="rfs-8"><strong>Selamat Datang di Sahabat Teknik</strong></p>
                            <p>Di Sahabat Teknik, kami memiliki hasrat terhadap teknologi dan berkomitmen untuk menyediakan produk dan layanan terbaik kepada pelanggan kami. Didirikan pada tahun [Tahun], kami telah tumbuh menjadi nama terpercaya dalam industri ritel komputer dan elektronik.</p>
                            <p>Misi Kami: menawarkan komputer, periferal, dan aksesori berkualitas tinggi dengan harga kompetitif serta memberikan layanan pelanggan yang luar biasa. Kami bertujuan untuk menjadi sumber utama Anda untuk semua kebutuhan teknologi, baik Anda pengguna rumahan, bisnis, atau penggemar.</p>
                        </div>
                    </div>

                    <div class="lc-block mb-6">
                        <a class="btn btn-primary px-4 me-md-2 btn-lg" href="{{ url('produk') }}" role="button">Lihat Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section bg-soft" id="download">
    <figure class="position-absolute top-0 left-0 w-100 d-none d-md-block mt-n3">
        <svg class="fill-soft" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 43.4" style="enable-background:new 0 0 1920 43.4;" xml:space="preserve">
            <path d="M0,23.3c0,0,405.1-43.5,697.6,0c316.5,1.5,108.9-2.6,480.4-14.1c0,0,139-12.2,458.7,14.3 c0,0,67.8,19.2,283.3-22.7v35.1H0V23.3z"></path>
        </svg>
    </figure>
    <div class="container">
        <div class="row row-grid align-items-center">
            <div class="col-12 col-lg-6">
                <span class="h5 text-muted mb-2 d-block">Buka Setiap Hari Senin - Sabtu</span>
                <h2 class="display-3 mb-4">Jam 08.00 - 20.30</h2>
                <span class="h5 text-muted mb-2 d-block">Tahun Berdiri : 2015</span>

                <p class="mt-4 lead text-muted"><small>Jln. Raya Boteng No 09 Menganti Gresik</small></p>
                <p class="lead text-muted"><small>Prambon, Boboh, Kec. Menganti, Kabupaten Gresik, Jawa Timur 61174</small></p>
                <p class="lead text-muted">Follow dan Subscribe Akun Sosial Media Kami:</p>
                <p class="lead text-muted text-end logos">
                    <a href="https://www.instagram.com/satnik_itsolutions?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="text-decoration-none me-3 logo">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a href="https://www.tiktok.com/@satniksolutions?is_from_webapp=1&sender_device=pc" target="_blank" class="text-decoration-none me-3 logo">
                        <i class="fab fa-tiktok fa-2x"></i>
                    </a>
                    <a href="https://www.youtube.com/@satnikmedia" target="_blank" class="text-decoration-none me-3 logo">
                        <i class="fab fa-youtube fa-2x"></i>
                    </a>
                    <a href="https://maps.app.goo.gl/pWK92jbPEiGHJswH6" target="_blank" class="text-decoration-none logo">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </a>
                </p>
                <div class="d-flex flex-column align-items-start mt-3">
                    <h5 class="lead text-muted">Hubungi Kami:</h5>
                    <a href="https://wa.me/6289521662482" target="_blank" class="text-decoration-none d-flex align-items-center logo mt-2">
                        <i class="fab fa-whatsapp fa-2x me-2" style="font-size: 3rem;"></i>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-5 ml-lg-auto">
                <img class="d-none d-lg-inline-block" src="{{ asset('/') }}assets/img/BG_SahabatTeknik.png" alt="Mobile App Illustration">
            </div>
        </div>
    </div>
</div>

<div class="owl-carousel owl-theme" id="hero-carousel">
    <div class="item">
        <img src="{{ asset('/') }}assets/img/BG_SahabatTeknik.png" alt="Slide 1" class="c-img">
        <div class="carousel-caption">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
        </div>
    </div>
    <div class="item">
        <img src="{{ asset('/') }}assets/img/BG_SahabatTeknik2.png" alt="Slide 2" class="c-img">
        <div class="carousel-caption">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
        </div>
    </div>
    <div class="item">
        <img src="{{ asset('/') }}assets/img/BG_SahabatTeknik3.png" alt="Slide 3" class="c-img">
        <div class="carousel-caption">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
        </div>
    </div>
</div>


@push('after-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $("#hero-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            nav: true, 
            navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
            animateOut: 'fadeOut', 
            animateIn: 'fadeIn', 
            smartSpeed: 450 
        });
    });


    function fadeInElements() {
        var elements = document.querySelectorAll('.fade-in');
        elements.forEach(function(element) {
            var position = element.getBoundingClientRect().top;
            var screenPosition = window.innerHeight / 1.3;
            if (position < screenPosition) {
                element.classList.add('visible');
            }
        });
    }

    window.addEventListener('scroll', fadeInElements);
</script>
@endpush

@endsection
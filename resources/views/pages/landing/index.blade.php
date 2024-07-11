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

<div class="b-example-divider"></div>

@push('before-style')
<style>
    .carousel-item img {
        height: 600px;
        width: 100%;
        object-fit: cover;
    }
</style>

@endpush



<section class="pt-6 pb-2">
<div class="overflow-hidden ">
	<div class="container-fluid col-xl-8">
		<div class="row flex-lg-nowrap align-items-center g-5">
			<div class="order-lg-1 w-100">
				<img style="clip-path: polygon(25% 0%, 100% 0%, 100% 99%, 0% 100%);" src="{{ asset('/') }}assets/img/toko1.jpg" class="d-block mx-lg-auto img-fluid" alt="Photo by Milad Fakurian" loading="lazy" srcset="{{ asset('/') }}assets/img/toko1.jpg" sizes="(max-width: 1080px) 100vw, 1080px" width="2160" height="768">
				{{-- <img style="clip-path: polygon(25% 0%, 100% 0%, 100% 99%, 0% 100%);" src="{{ asset('/') }}assets/img/toko1.jpg" class="d-block mx-lg-auto img-fluid" alt="Photo by Milad Fakurian" loading="lazy" srcset="https://images.unsplash.com/photo-1618004912476-29818d81ae2e?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=768 1080w, https://images.unsplash.com/photo-1618004912476-29818d81ae2e??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=150 150w, https://images.unsplash.com/photo-1618004912476-29818d81ae2e??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=300 300w, https://images.unsplash.com/photo-1618004912476-29818d81ae2e??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=768 768w, https://images.unsplash.com/photo-1618004912476-29818d81ae2e??crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8NzV8fHB1cnBsZXxlbnwwfDB8fHwxNjQ3NDcxNjY4&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1024 1024w" sizes="(max-width: 1080px) 100vw, 1080px" width="2160" height="768"> --}}
			</div>
			<div class="col-lg-6 col-xl-5 text-center text-lg-start pt-lg-5 mt-xl-2">
				<div class="lc-block mb-4">
					<div editable="rich">
						{{-- <h1 class="fw-bold display-3"> {{Fungsi::app_nama()}}</h1> --}}
						<h1 class="fw-bold display-3">Tentang Toko Sahabat Teknik Komputer</h1>
					</div>
				</div>

				<div class="lc-block mb-5">
					<div editable="rich">
						<p class="rfs-8">Toko bangunan Eva Jaya adalah toko bangunan yang terletak di Kabupaten Malang yang menyediakan bahan dan alat bangunan seperti pasir, semen, dan alat-alat bangunan lainya. Sistem penjualan di toko Eva Jaya sekarang masih manual, Dengan adanya Eva Jaya Website, pembeli bisa membeli barang di toko Eva Jaya secara Online melalui website ini.</p>
						{{-- <p class="rfs-8">  {{Fungsi::desc()}}</p> --}}
					</div>
				</div>

				<div class="lc-block mb-6"><a class="btn btn-primary px-4 me-md-2 btn-lg" href="{{ url('produk') }}" role="button">Lihat Produk</a>
				</div>

				{{-- <div class="lc-block">
					<div editable="rich">
						<p class="fw-bold"> Business collaboration based on trust:</p>
					</div>
				</div>
				<div class="row">
					<div class="lc-block col-3"><img class="img-fluid wp-image-975" src="https://library.livecanvas.com/starters/wp-content/uploads/sites/15/2021/11/motorola.svg" width="" height="300" srcset="" sizes="" alt=""></div>
					<div class="lc-block col-3"><img class="img-fluid wp-image-977" src="https://library.livecanvas.com/starters/wp-content/uploads/sites/15/2021/11/asus.svg" width="" height="300" srcset="" sizes="" alt=""></div>
					<div class="lc-block col-3"><img class="img-fluid wp-image-974" src="https://library.livecanvas.com/starters/wp-content/uploads/sites/15/2021/11/sony.svg" width="" height="300" srcset="" sizes="" alt=""></div>
					<div class="lc-block col-3"><img class="img-fluid wp-image-967" src="https://library.livecanvas.com/starters/wp-content/uploads/sites/15/2021/11/samsung-282297.svg" width="" height="300" srcset="" sizes="" alt=""></div>
				</div> --}}
			</div>

		</div><!-- /lc-block -->
	</div>
</div>
</section>


        {{-- <section class="section section-header text-dark pb-md-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center mb-2 mb-md-1">
                        <h1 class="display-2 font-weight-bolder mb-4">
                           {{Fungsi::app_nama()}}
                        </h1>
                        <p class="lead mb-4 mb-lg-5"> {{Fungsi::desc()}} </p>


        @php
        $commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));
        $commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
        $commitDate->setTimezone(new \DateTimeZone('UTC'));
        $versi=$commitDate->format('Ymd.H.i.s');
    @endphp
                        <div>
                            <a href="{{route('produk')}}" class="btn btn-dark btn-download-app">
                                <span class="d-flex align-items-center">
                                    <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-google-play"></span></span>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-normal d-none d-md-block"></small> Mulai Belanja
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section> --}}





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
                        {{-- <p class="lead text-muted">Quickly connect to tools and services such as Google Analytics, Intercom or Github to track, measure and optimize performance. </p> --}}
                        <span class="h5 text-muted mb-2 d-block">Nama Pemilik: H. Nasuki</span>
                        <span class="h5 text-muted mb-2 d-block">Karyawan: Ibu Sum dan Evarina</span>
                        <span class="h5 text-muted mb-2 d-block">Tahun Berdiri : 12 Agustus 2011</span>
                        <span class="h5 text-muted mb-2 d-block">No Rek : 6769-4568953 - H. Nasuki</span>

                        <p class=" mt-4 lead  text-muted"><small>Jln. Sunan kali jaga RT 08 RW 01 </small></p>
                        <p class="lead  text-muted"><small>Dusun Ngipek Desa Kanigoro Kecamatan Pagelaran Kabupaten Malang </small></p>
                        <p class="lead  text-muted "> Telp : +62 857-0419-2502</p>
                        {{-- <div class="mt-4 mt-lg-5">
                            <a href="#" class="btn btn-dark btn-download-app mb-xl-0 mr-2 mr-md-3">
                                <span class="d-flex align-items-center">
                                    <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-apple"></span></span>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-normal d-none d-md-block">Available on</small> App Store
                                    </span>
                                </span>
                            </a>
                            <a href="#" class="btn btn-dark btn-download-app">
                                <span class="d-flex align-items-center">
                                    <span class="icon icon-brand mr-2 mr-md-3"><span class="fab fa-google-play"></span></span>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-normal d-none d-md-block">Available on</small> Google Play
                                    </span>
                                </span>
                            </a>
                        </div> --}}
                    </div>
                    <div class="col-12 col-lg-5 ml-lg-auto">
                        <img class="d-none d-lg-inline-block" src="{{ asset('/') }}assets/img/BG_SahabatTeknik.png" alt="Mobile App Illustration">
                    </div>
                </div>

            </div>
        </div>
        {{-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('/') }}assets/img/hero-1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('/') }}assets/img/hero-1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('/') }}assets/img/hero-1.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div> --}}

          <section class="section section-header text-dark pb-md-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center mb-2 mb-md-1">
                        <div class="py-2">
                            {{-- button Carousel --}}
                            <button class="btn btn-primary px-4"  data-bs-target="#carouselExampleInterval" data-bs-slide="prev"><i class="fa-solid fa-arrow-left"></i></button>
                            <button class="btn btn-primary px-4" data-bs-target="#carouselExampleInterval" data-bs-slide="next"><i class="fa-solid fa-arrow-right"></i></button>
                        </div>

                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active" data-bs-interval="10000">
                                <img src="{{ asset('/') }}assets/img/BG_SahabatTeknik.png" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item" data-bs-interval="2000">
                                <img src="{{ asset('/') }}assets/img/BG_SahabatTeknik2.png" class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="{{ asset('/') }}assets/img/BG_SahabatTeknik3.png" class="d-block w-100" alt="...">
                              </div>
                            </div>

                          </div>
                          {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button> --}}
                    </div>
                    {{-- <div class="col-12 col-md-10 justify-content-center">
                        <img class="d-none d-md-inline-block" src="{{ asset('/') }}assets/template/swipe/assets/img/illustrations/scene.svg" alt="Mobile App Mockup">
                    </div> --}}
                </div>
            </div>
        </section>

@endsection

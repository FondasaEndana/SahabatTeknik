<!--

=========================================================
* Swipe - Mobile App One Page Bootstrap 5 Template
=========================================================

* Product Page: https://themesberg.com/product/bootstrap/swipe-free-mobile-app-one-page-bootstrap-5-template
* Copyright 2020 Themesberg (https://www.themesberg.com)

* Coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Contact us if you want to remove it.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>{{Fungsi::app_nama()}}</title>


@stack('before-style')
@include('includes.landingstyle')
@stack('after-style')
<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>
    <header class="header-global" id="home">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-theme-secondary">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-4" href="{{ url('/') }}">
                <img class="navbar-brand-dark" src="{{ asset('/') }}assets/img/original_satnikk.png" alt="Logo light">
                <img class="navbar-brand-light" src="{{ asset('/') }}assets/img/original_satnikk.png"alt="Logo dark">
                {{-- <img class="navbar-brand-dark" src="{{ asset('/') }}assets/template/swipe/assets/img/light.svg" alt="Logo light">
                <img class="navbar-brand-light" src="{{ asset('/') }}assets/template/swipe/assets/img/dark.svg" alt="Logo dark"> --}}
            </a>
            <div class="navbar-collapse collapse mr-auto" id="navbar_global">

            {{-- sidebar --}}
            @include('includes.landingtopbar')

            </div>
            <div class="d-flex align-items-center">
                {{-- {{ Auth::user()?Auth::user()->name:'Belum Login' }} --}}
                @if (Auth::user())
                <a href="{{route('login')}}" class="btn btn-outline-soft d-none d-md-inline mr-md-3 animate-up-2">Dashboard</a>
                <a href="{{route('keranjang')}}"  class="btn btn-md btn-tertiary text-white d-none d-md-inline animate-up-2">Keranjang<i class="fa-solid fa-cart-arrow-down ml-2"></i></a>
                

                @else
                <a href="{{route('daftar')}}" class="btn btn-outline-soft d-none d-md-inline mr-md-3 animate-up-2">Daftar</a>
                <a href="{{route('login')}}" class="btn btn-outline-soft d-none d-md-inline mr-md-3 animate-up-2">Login</a>
                @endif
               <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>
    <main>
        @yield('content')
        @yield('containermodal')
    </main>

    <footer class="footer py-5 pt-lg-6">
    
    <div class="sticky-right">
        <a href="#home" class="icon icon-primary icon-md btn btn-icon-only btn-white border border-soft shadow-soft animate-up-3">
            <span class="fas fa-chevron-up"></span>
        </a>
    </div>
    <div class="container">
        <hr class="bg-light my-2">
        <div class="row pt-2 pt-lg-5">
            <div class="col mb-md-0">
                <a href="#" target="_blank" class="d-flex justify-content-center">
                    <img src="{{ asset('/') }}assets/img/original_satnikk.png" height="25" class="mb-3" alt="Themesberg Logo">
                </a>
            <div class="d-flex text-center justify-content-center align-items-center" role="contentinfo">
                <p class="font-weight-normal font-small mb-0">SATNIK IT SOLUTIONS - <span class="current-year">2024</span></p>
                </div> 
            </div>
        </div>
    </div>
</footer>


{{-- script --}}
@stack('before-script')
@include('includes.landingscript')
@stack('after-script')

</body>

</html>

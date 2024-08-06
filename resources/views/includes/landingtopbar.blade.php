<div class="navbar-collapse-header">
    <div class="row">
        <div class="col-6 collapse-brand">
            <a href="{{ url('/') }}">
                {{-- <img src="{{ asset('/') }}assets/img/BG_SahabatTeknik.png" alt="Logo dark"> --}}
                <img src="{{ asset('/') }}assets/img/BG_SahabatTeknik.png" alt="Logo dark">
            </a>
        </div>
        <div class="col-6 collapse-close">
            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
        </div>
    </div>
</div>
<ul class="navbar-nav navbar-nav-hover align-items-lg-center">
    {{-- <li class="nav-item">
        <a href="{{route('about')}}" class="nav-link">
            Tentang
        </a>
    </li> --}}
    <li class="nav-item">
        <a href="{{route('produk')}}" class="nav-link">
            Produk
        </a>
    </li>

    <li class="nav-item">
        <a href="{{route('jasa')}}" class="nav-link">
            Jasa
        </a>
    </li>

    <li class="nav-item">
        <a href="{{route('keranjang')}}" class="nav-link">
            Keranjang
        </a>
    </li>

    <li class="nav-item d-lg-none">
        @if (Auth::check())
            <a href="{{route('dashboard')}}" class="nav-link">
                Dashboard
            </a>
        @else
            <a href="{{route('login')}}" class="nav-link">
                Login
            </a>
        @endif
    </li>

    {{-- <li class="nav-item">
        <a href="#testimonials" class="nav-link">
            Portofolio
        </a>
    </li> --}}
    {{-- <li class="nav-item">
        <a href="#faq" class="nav-link">
            Cheatsheet
        </a>
    </li> --}}
    {{-- <li class="nav-item">
        <a href="#download" class="nav-link">
            Hire Me
        </a>
    </li> --}}
</ul>

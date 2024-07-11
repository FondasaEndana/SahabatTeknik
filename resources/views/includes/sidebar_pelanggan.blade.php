

<!-- Mastering -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>


    <li class="menu-item {{$pages=='produk'?'active': ''}}">
        <a
            href="{{route('produk')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-brands fa-product-hunt"></i>
            <div data-i18n="Support">Produk</div>
        </a>
        </li>

        <li class="menu-item {{$pages=='keranjang'?'active': ''}}">
            <a
                href="{{route('pelanggan.transaksi.create')}}"
                class="menu-link"
            >
            <i class="menu-icon fa-solid fa-cart-arrow-down"></i>
                <div data-i18n="Support">Keranjang</div>
            </a>
            </li>
<!-- Transaksi -->
<li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span></li>
    <li class="menu-item {{$pages=='transaksi'?'active': ''}}">
        <a
            href="{{route('pelanggan.transaksi')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-cart-shopping"></i>
            <div data-i18n="Support">Transaksi</div>
        </a>
        </li>


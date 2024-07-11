
<li class="menu-header small text-uppercase"><span class="menu-header-text">Menu </span></li>
    <li class="menu-item {{$pages=='laporanrestok'?'active': ''}}">
        <a
            href="{{route('admin.laporanrestok')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-file-invoice"></i>
            <div data-i18n="Support">Laporan Pengadaan / Restok Produk</div>
        </a>
        </li>


    <li class="menu-item {{$pages=='laporanpenjualan'?'active': ''}}">
        <a
        href="{{route('admin.laporanpenjualan')}}"
            class="menu-link"
        >
        <i class="menu-icon fa-solid fa-file-invoice-dollar"></i>
            <div data-i18n="Support">Laporan Penjualan</div>
        </a>
        </li>
        <li class="menu-item {{$pages=='laporanlaba'?'active': ''}}">
            <a
            href="{{route('admin.laporanlaba')}}"
                class="menu-link"
            >
            <i class="menu-icon fa-solid fa-file-invoice-dollar"></i>
                <div data-i18n="Support">Laporan Laba</div>
            </a>
            </li>

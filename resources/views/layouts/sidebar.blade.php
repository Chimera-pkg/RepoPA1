<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="{{ route('home') }}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bold ms-1" style="font-size: 22px;color: palevioletred">Annisa
                Cosmetic</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0  "></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        {{-- <li class="menu-item active">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboards">Dashboards</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="index-2.html" class="menu-link">
                <div data-i18n="Analytics">
                    Analytics
                </div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="dashboards-ecommerce.html" class="menu-link">
                <div data-i18n="eCommerce">
                    eCommerce
                </div>
            </a>
        </li>
    </ul>
</li> --}}
        @if (Auth::user()->role == 'admin')
            <li class="menu-item <?= Request::segment(1) == 'kelola_pengguna' ? 'active' : '' ?>">
                <a href="{{ route('kelola_pengguna') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Kelola Pengguna">Kelola Pengguna</div>
                </a>
            </li>

            <li class="menu-item <?= Request::segment(1) == 'inventori' ? 'active' : '' ?>">
                <a href="{{ route('inventori') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-basket"></i>
                    <div data-i18n="Barang">Barang</div>
                </a>

            </li>
        @elseif(Auth::user()->role == 'gudang')
            <li class="menu-item <?= Request::segment(1) == 'home' ? 'active' : '' ?>">
                <a href="{{ route('home') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Beranda">Beranda</div>
                </a>

            </li>


            <li class="menu-item <?= Request::segment(1) == 'inventori' ? 'active' : '' ?>">
                <a href="{{ route('inventori') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-basket"></i>
                    <div data-i18n="Barang">Barang</div>
                </a>

            </li>
        @endif



    </ul>

</aside>

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
        {{-- @dd(Auth::user()->role) --}}
        @if (Auth::user()->role == 'admin')

        <li class="menu-item <?= Request::segment(1) == 'home' ? 'active' : '' ?>">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Beranda">Beranda</div>
            </a>

        </li>

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


        <li class="menu-item <?= Request::segment(1) == 'barang_masuk' || Request::segment(1) == 'barang_keluar' ? 'active' : '' ?>">
            <div class="menu-link menu-dropdown">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Kelola Stok Barang">Transaksi Barang</div>
                <span class="caret">
                </span>
            </div>
            <ul class="nested">
                <li class="menu-item <?= Request::segment(1) == 'barang_masuk'  ? 'active' : '' ?>">
                    <a href="{{ route('barang_masuk') }}" class="menu-link">
                        Barang Masuk
                    </a>

                </li>
                <li class="menu-item <?= Request::segment(1) == 'barang_keluar'  ? 'active' : '' ?>">
                    <a href="{{ route('barang_keluar') }}" class="menu-link">
                        Barang Keluar
                    </a>

                </li>
            </ul>
        </li>

        <li class="menu-item <?= Request::segment(1) == 'pengembalian' ? 'active' : '' ?>">
            <a href="{{ route('pengembalian') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-basket"></i>
                <div data-i18n="Pengembalian Barang">Pengembalian Barang</div>
            </a>

        </li>

        <li class="menu-item <?= Request::segment(1) == 'supplier' ? 'active' : '' ?>">
            <a href="{{ route('supplier') }}" class="menu-link">
                <i class="mr-3 ml-1 tf-icons fas fa-user-alt"></i>
                <div data-i18n="Supplier">Supplier</div>
            </a>

        </li>

        <li class="menu-item <?= Request::segment(1) == 'laporan' ? 'active' : '' ?>">
            <a href="{{ route('laporan') }}" class="menu-link">
                <i class="mr-3 ml-1 tf-icons fas fa-file-alt"></i>
                <div data-i18n="Laporan">Laporan</div>
            </a>
        </li>
        @elseif (Auth::user()->role == 'gudang')
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

        <li class="menu-item <?= Request::segment(1) == 'barang_masuk' || Request::segment(1) == 'barang_keluar' ? 'active' : '' ?>">
            <div class="menu-link menu-dropdown">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Kelola Stok Barang">Transaksi Barang</div>
                <span class="caret">
                </span>
            </div>
            <ul class="nested">
                <li class="menu-item <?= Request::segment(1) == 'barang_masuk'  ? 'active' : '' ?>">
                    <a href="{{ route('barang_masuk') }}" class="menu-link">
                        Barang Masuk
                    </a>
                </li>
                <li class="menu-item <?= Request::segment(1) == 'barang_keluar'  ? 'active' : '' ?>">
                    <a href="{{ route('barang_keluar') }}" class="menu-link">
                        Barang Keluar
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item <?= Request::segment(1) == 'pengembalian' ? 'active' : '' ?>">
            <a href="{{ route('pengembalian') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-basket"></i>
                <div data-i18n="Pengembalian Barang">Pengembalian Barang</div>
            </a>
        </li>

        <li class="menu-item <?= Request::segment(1) == 'supplier' ? 'active' : '' ?>">
            <a href="{{ route('supplier') }}" class="menu-link">
                <i class="mr-3 ml-1 tf-icons fas fa-user-alt"></i>
                <div data-i18n="Supplier">Supplier</div>
            </a>
        </li>

        <li class="menu-item">
            <div class="menu-link menu-dropdown">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Pengajuan Barang">Pengajuan Barang</div>
                <span class="caret">
                </span>
            </div>
            <ul class="nested">
                <li class="menu-item <?= Request::segment(2) == 'gudang' && Request::segment(3) != 'baru'  ? 'active' : '' ?>">
                    <a href="{{ route('pengajuan.gudang.index') }}" class="menu-link">
                        Pengajuan Barang Lama
                    </a>
                </li>
                <li class="menu-item <?= Request::segment(2) == 'gudang' && Request::segment(3) == 'baru'  ? 'active' : '' ?>">
                    <a href="{{ route('pengajuan.gudang.baru.index') }}" class="menu-link">
                        Pengajuan Barang Baru
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item <?= Request::segment(1) == 'laporan' ? 'active' : '' ?>">
            <a href="{{ route('laporan') }}" class="menu-link">
                <i class="mr-3 ml-1 tf-icons fas fa-file-alt"></i>
                <div data-i18n="Laporan">Laporan</div>
            </a>
        </li>
        <!-- Fitur baru Gudang(karyawan) -->
        <li class="menu-item <?= Request::segment(1) == 'barang' ? 'active' : '' ?>">
            <a href="{{ route('penerimaan') }}" class="menu-link">
                <i class="mr-3 ml-1 tf-icons fas fa-user-alt"></i>
                <div data-i18n="Penerimaan barang">Penerimaan barang</div>
            </a>
        </li>
        @elseif (Auth::user()->role == 'manager')
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

        <li class="menu-item <?= Request::segment(1) == 'barang_masuk' || Request::segment(1) == 'barang_keluar' ? 'active' : '' ?>">
            <div class="menu-link menu-dropdown">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Kelola Stok Barang">Transaksi Barang</div>
                <span class="caret">
                </span>
            </div>
            <ul class="nested">
                <li class="menu-item <?= Request::segment(1) == 'barang_masuk'  ? 'active' : '' ?>">
                    <a href="{{ route('barang_masuk') }}" class="menu-link">
                        Barang Masuk
                    </a>
                </li>
                <li class="menu-item <?= Request::segment(1) == 'barang_keluar'  ? 'active' : '' ?>">
                    <a href="{{ route('barang_keluar') }}" class="menu-link">
                        Barang Keluar
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item <?= Request::segment(1) == 'pengembalian' ? 'active' : '' ?>">
            <a href="{{ route('pengembalian') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-basket"></i>
                <div data-i18n="Pengembalian Barang">Pengembalian Barang</div>
            </a>
        </li>

        <li class="menu-item <?= Request::segment(1) == 'supplier' ? 'active' : '' ?>">
            <a href="{{ route('supplier') }}" class="menu-link">
                <i class="mr-3 ml-1 tf-icons fas fa-user-alt"></i>
                <div data-i18n="Supplier">Supplier</div>
            </a>
        </li>

         <!-- Fitur baru Gudang(karyawan) -->
        <li class="menu-item <?= Request::segment(1) == 'supplier' ? 'active' : '' ?>">
            <a href="{{ route('supplier') }}" class="menu-link">
                <i class="mr-3 ml-1 tf-icons fas fa-user-alt"></i>
                <div data-i18n="Supplier">Penerimaan barang</div>
            </a>
        </li>

        <li class="menu-item">
            <div class="menu-link menu-dropdown">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Pengajuan Barang">Pengajuan Barang</div>
                <span class="caret">
                </span>
            </div>
            <ul class="nested">
                <li class="menu-item <?= Request::segment(1) == 'pengajuan'  ? 'active' : '' ?>">
                    <a href="{{ route('pengajuan.index') }}" class="menu-link">
                        Pengajuan Barang Lama
                    </a>
                </li>
                <li class="menu-item <?= Request::segment(1) == 'pengajuana'  ? 'active' : '' ?>">
                    <a href="{{ route('pengajuan.baru.index') }}" class="menu-link">
                        Pengajuan Barang Baru
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item <?= Request::segment(1) == 'laporan' ? 'active' : '' ?>">
            <a href="{{ route('laporan') }}" class="menu-link">
                <i class="mr-3 ml-1 tf-icons fas fa-file-alt"></i>
                <div data-i18n="Laporan">Laporan</div>
            </a>
        </li>
        @elseif (Auth::user()->role == 'sales')
        <li class="menu-item <?= Request::segment(1) == 'barang_masuk' || Request::segment(1) == 'barang_keluar' ? 'active' : '' ?>">
            <div class="menu-link menu-dropdown">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Kelola Stok Barang">Transaksi Barang</div>
                <span class="caret">
                </span>
            </div>
            <ul class="nested">
                <li class="menu-item <?= Request::segment(1) == 'barang_masuk'  ? 'active' : '' ?>">
                    <a href="{{ route('barang_masuk') }}" class="menu-link">
                        Barang Masuk
                    </a>
                </li>
                <li class="menu-item <?= Request::segment(1) == 'barang_keluar'  ? 'active' : '' ?>">
                    <a href="{{ route('barang_keluar') }}" class="menu-link">
                        Barang Keluar
                    </a>
                </li>
            </ul>
        </li>
        @endif
</aside>
<script>
    var toggler = document.getElementsByClassName("menu-dropdown");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }
</script>
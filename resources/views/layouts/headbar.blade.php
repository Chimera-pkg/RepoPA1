<ul class="navbar-nav flex-row align-items-center ms-auto">

    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'gudang')
    <?php
    $tanggalSatuBulanLalu = Carbon\Carbon::now()->addYear();
    $pesan =  App\Models\Pesan::where('status', 1)->count();

    ?>

    <!-- Notification -->
    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
        <a class="nav-link " href="{{route('pesan')}}">
            <i class="far fa-envelope" style="font-size: 20px;"></i>
            <span class="badge bg-danger rounded-pill badge-notifications">{{$pesan}}</span>
        </a>
    </li>
    @endif
    <!--/ Notification -->

    <?php
    $tanggalSatuBulanLalu = Carbon\Carbon::now()->addYear();
    $dataBarangKurangSatuBulan = App\Models\Inventory::where('kadaluarsa_barang', '>=', Carbon\Carbon::now())
        ->where('kadaluarsa_barang', '<=', $tanggalSatuBulanLalu)
        ->where('status_barang', '1')
        ->get();

    ?>

    <!-- Notification -->
    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
            <i class="bx bx-bell bx-sm"></i>
            <span class="badge bg-danger rounded-pill badge-notifications">{{count($dataBarangKurangSatuBulan)}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end py-0">
            <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                    <h5 class="text-body mb-0 me-auto">
                        Notification
                    </h5>
                    <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                </div>
            </li>
            <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush">
                    @foreach($dataBarangKurangSatuBulan as $data)
                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <img src="{{url('assets/img/bahan/',$data->gambar_barang)}}" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    {{$data->nama_barang}}
                                </h6>
                                <p class="mb-0">
                                    Kadaluarsa Tinggal <?= Carbon\Carbon::parse($data->kadaluarsa_barang)->diffInDays(Carbon\Carbon::now()); ?> Hari Lagi
                                </p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <!-- <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <img src="../../assets/img/avatars/2.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">
                                    New Message
                                    ✉️
                                </h6>
                                <p class="mb-0">
                                    You have new
                                    message from
                                    Natalie
                                </p>
                                <small class="text-muted">1h
                                    ago</small>
                            </div>
                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                            </div>
                        </div>
                    </li> -->

                </ul>
            </li>
            <li class="dropdown-menu-footer border-top">
                <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
                    View all notifications
                </a>
            </li>
        </ul>
    </li>
    <!--/ Notification -->

    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
                <img src="{{ asset('/') }}assets/img/avatars/{{ Auth::user()->avatar }}" alt class="rounded-circle" />
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="{{ route('profile') }}">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('/') }}assets/img/avatars/{{ Auth::user()->avatar }}" alt class="rounded-circle" />
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <span class="fw-semibold d-block lh-1">{{ Auth::user()->name }}</span>
                            <small>{{ Auth::user()->role }}</small>
                        </div>
                    </div>
                </a>
            </li>

            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </li>
    <!--/ User -->
</ul>
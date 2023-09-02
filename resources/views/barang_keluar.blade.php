@extends('layouts.app')

@section('addStyle')
<link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
<link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
@endsection

@section('content')
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
        <!-- Menu -->

        @include('layouts.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="container-fluid">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        @include('layouts.headbar')
                    </div>


                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Users List Table -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h5 class="card-title">List Barang Keluar</h5>

                            {{-- @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <h6 class="alert-heading mb-1">
                                            <i class="bx bx-xs bx-store align-top me-2"></i>Danger!
                                        </h6>
                                        <span>

                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                            @endforeach
                            </ul>

                            </span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif --}}

                        <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                            <div class="col-md-4 user_role"></div>

                        </div>

                        @if (Auth::user()->role != 'sales' && Auth::user()->role != 'manager')
                        <button class="btn btn-primary mb-4 " style="width: 20%;" onclick="show('<?= route('barang_keluar.create') ?>')"><i class="bx bx-plus me-0 me-lg-2"></i><span class="">Tambah Barang</button>
                        @endif
                        <form action="{{route('barang_keluar.filter_produk')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-4">
                                            <select class="form-select" name="parameterA" style="width: 100%;" id="bulan">
                                                <option selected disabled>Semua</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-select" name="bulan" id="bulan">
                                                <option selected disabled>--- Bulan ---</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-select" name="tahun" id="tahun">
                                                <option selected disabled>--- Tahun ---</option>
                                                @for($t = 1995; $t <= 2050; $t++) <option value="{{$t}}">{{$t}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-success mb-3">
                                        <i class="fas fa-filter"></i>&nbsp;&nbsp;Tampilkan
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>

                <div class="card-datatable table-responsive">
                    <table id="myTable" class="datatables-users table border-top">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Nama Produk</th>
                                <th>Petugas</th>
                                <th>Jumlah</th>
                                <th>Total Stok</th>
                                <th>Tanggal Kelola</th>
                                {{-- <th>Status</th> --}}
                                @if (Auth::user()->role != 'manager')
                                <th>Action</th>
                                @endif

                            </tr>
                        </thead>
                        <tbody>
                            @php $x=1 @endphp
                            @foreach($barang_keluar as $data) <tr>
                                <td>{{$x++}}</td>
                                <td>{{$data->id}}</td>
                                <td>{{$data->barang->nama_barang}}</td>
                                <td>{{$data->user->name}}</td>
                                <td>{{$data->jumlah}}</td>
                                <td>{{$data->barang->stok_barang}}</td>
                                <td>{{strftime('%d %B %Y', strtotime($data->tanggal))}} {{$data->jam}}</td>
                                @if (Auth::user()->role != 'manager' )
                                <td>
                                    @if (Auth::user()->role != 'sales')
                                    <button class="btn btn-warning btn-sm" onclick="show('<?= route('barang_keluar.edit', $data->id) ?>')"><i class="fas fa-edit "></i></button>
                                    <a class="btn btn-danger btn-sm" onclick="notificationforDelete(event, this)" href="{{route('barang_keluar.destroy',$data->id)}}"><i class="fas fa-trash"></i></a>
                                    @else
                                    <button class="btn btn-warning btn-sm" onclick="show('<?= route('pesan.show', $data->id) ?>')"><i class="fas fa-comment"></i></button>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>




                    </table>
                </div>


            </div>
        </div>
        <!-- / Content -->

        @include('layouts.footer')

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->
@endsection

@section('addScript')
{{-- <script src="{{ asset('/') }}assets/vendor/libs/jquery/jquery.js"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="{{ asset('/') }}assets/vendor/libs/moment/moment.js"></script>
<script src="{{ asset('/') }}assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="{{ asset('/') }}assets/vendor/libs/select2/select2.js"></script>\
<script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="{{ asset('/') }}assets/vendor/libs/cleavejs/cleave-phone.js"></script>

<!-- Page JS -->
{{-- <script src="{{ asset('/') }}assets/js/app-user-list.js"></script> --}}

@if ($message = Session::get('success'))
<script>
    swal({
        title: "{{ $message }}",
        icon: "success",
        button: "Ok!",
    });
</script>
@endif


<script>
    function preview_img() {

        const avatar = document.querySelector('#avatar_add');
        const sampulLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview-add');

        avatar.textContent = avatar.files[0].name;

        const fileAvatar = new FileReader();
        fileAvatar.readAsDataURL(avatar.files[0]);

        fileAvatar.onload = function(e) {
            imgPreview.src = e.target.result;
        }

    }

    function preview_img_2() {

        const avatar = document.querySelector('#avatar');
        const sampulLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        avatar.textContent = avatar.files[0].name;

        const fileAvatar = new FileReader();
        fileAvatar.readAsDataURL(avatar.files[0]);

        fileAvatar.onload = function(e) {
            imgPreview.src = e.target.result;
        }

    }
</script>

<script>
    $(".add-new").click(function() {
        alert("Handler for .click() called.");
    });
</script>

@if ($errors->any())
<script>
    $(document).ready(function() {
        $('#offcanvasAddUser').offcanvas('show')
    });
</script>
@endif
@endsection
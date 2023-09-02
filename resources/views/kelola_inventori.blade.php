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
                                <h5 class="card-title">List Barang</h5>
                            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                                <div class="col-md-4 user_role"></div>
                            </div>
                            <a href="{{ route('kelola_stok.stok_kurang_20') }}" class="btn btn-info"> 
                                &nbsp;Data Barang Stok <{{20}} &nbsp;&nbsp; 
                                @if( $jumlah != 0) 
                                    <span class="badge badge-light bg-dark">{{$jumlah}}</span>
                                @endif
                            </a>
                            @if (Auth::user()->role != 'manager')
                                <button class="btn btn-primary" style="width: 30%;" onclick="show('<?= route('inventori.create') ?>')"><i class="bx bx-plus me-0 me-lg-2"></i><span class="">Tambah Barang</button>
                            @endif
                        </div>
                        <div class="card-datatable table-responsive">
                            <table id="myTable" class="datatables-users table border-top">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Notifikasi</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Satuan</th>
                                        <th>Jadwal Kadaluarsa</th>
                                        <th>Supplier</th>
                                        <th>Stok</th>
                                        @if (Auth::user()->role != 'manager')
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $x=1 @endphp
                                    @foreach($inventori as $data) 
                                        <tr>
                                            <td>{{$x++}}</td>
                                            <td>{{$data->nomor_notifikasi}}</td>
                                            <td>
                                                <div class="d-flex justify-content-start align-items-center user-name">
                                                    <div class="avatar-wrapper">
                                                        <div class="avatar avatar-sm me-3">
                                                            <img src="{{ url('assets/img/bahan/',$data->gambar_barang)}}" alt="Avatar" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column"><a href="{{route('inventori.detail',$data->id)}}" class="text-body text-truncate"><span class="fw-semibold">{{$data->nama_barang}}</span></a><small class="text-muted">Stok: {{$data->stok_barang}}</small></div>
                                                </div>
                                            </td>
                                            <td>{{$data->stok_barang}}</td>
                                            <td>{{$data->satuan_barang}}</td>
                                            <td>{{$data->kadaluarsa_barang}}</td>
                                            <td>{{$data->supplier ? $data->supplier->nama : '-'}}</td>
                                            <td>{{$data->stok_barang}}</td>
                                            @if (Auth::user()->role != 'manager')
                                                <td>
                                                    <button class="btn btn-warning btn-sm" onclick="show(' <?= route('inventori.edit', $data->id) ?>')"><i class="fas fa-edit "></i></button>
                                                    <a class="btn btn-danger btn-sm" onclick="notificationforDelete(event, this)" href="{{route('inventori.delete',$data->id)}}"><i class="fas fa-trash"></i></a>
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
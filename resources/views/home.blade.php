@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                    <i class="bx bx-search-alt bx-sm"></i>
                                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                                </a>
                            </div>
                        </div>
                        <!-- /Search -->

                        @include('layouts.headbar')


                    </div>

                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper  d-none">
                        <input type="text" class="form-control search-input container-fluid border-0" placeholder="Search..." aria-label="Search..." />
                        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                    </div>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">




                        <!-- Statistics cards & Revenue Growth Chart -->
                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <!-- Statistics Cards -->
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card h-80">
                                        <div class="row">
                                            <div class="col-4" style="text-align: center; vertical-align: middle; background-color: #00c0ef; color:#fff; padding:1rem">
                                                <i class="fas fa-archive" style="text-align: center; font-size: 60px; margin-top: 0.5rem;"></i>
                                            </div>
                                            <div class="col-8" style="padding: 10px;">
                                                <a href="{{ route('barang_masuk') }}" class="text-secondary">
                                                    <p style="font-size: 10px; height: 0.2rem;">TOTAL BARANG MASUK</p>
                                                    <p style="font-size: 12px; height: 0.2rem; font-weight: bold;">{{number_format($total_barang_masuk, 0, ",", ".")}} Item</p>
                                                </a>
                                                <a href="{{ route('barang_keluar') }}" class="text-secondary">
                                                    <p style="font-size: 10px; height: 0.2rem;">TOTAL BARANG KELUAR</p>
                                                    <p style="font-size: 12px; height: 0.2rem; font-weight: bold;">{{number_format($total_barang_keluar, 0, ",", ".")}} Item</p>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card h-80">
                                        <div class="row">
                                            <div class="col-4" style="text-align: center; vertical-align: middle; background-color: #00a65a ; color:#fff; padding:1rem">
                                                <i class="fas fa-server" style="text-align: center; font-size: 60px; margin-top: 0.5rem;"></i>
                                            </div>
                                            <div class="col-8" style="padding: 10px;">
                                                <a href="{{ route('barang_masuk') }}" class="text-secondary">
                                                    <p style="font-size: 10px; height: 0.2rem;">TOTAL TRANSAKSI BARANG MASUK</p>
                                                    <p style="font-size: 12px; height: 0.2rem; font-weight: bold;">{{number_format($transaksi_barang_masuk, 0, ",", ".")}} Kali</p>
                                                </a>
                                                <a href="{{ route('barang_keluar') }}" class="text-secondary">
                                                    <p style="font-size: 10px; height: 0.2rem;">TOTAL TRANSAKSI BARANG KELUAR</p>
                                                    <p style="font-size: 12px; height: 0.2rem; font-weight: bold;">{{number_format($transaksi_barang_keluar, 0, ",", ".")}} Kali</p>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card h-80">
                                        <div class="row">
                                            <div class="col-4" style="text-align: center; vertical-align: middle; background-color: #f39c12 ; color:#fff; padding:1rem">
                                                <i class="fas fa-money-bill-alt" style="text-align: center; font-size: 60px; margin-top: 0.5rem;"></i>
                                            </div>
                                            <div class="col-8" style="padding: 10px;">
                                                <p style="font-size: 10px; height: 0.2rem;">TOTAL PEMBELIAN</p>
                                                <p style="font-size: 12px; height: 0.2rem; font-weight: bold;">Rp. {{number_format($total_pembelian, 0, ",", ".")}}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <!--/ Statistics Cards -->

                            </div>
                        </div>
                        <!--/ Statistics cards & Revenue Growth Chart -->

                        <!-- Fitur Dashboard Grafik -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <div class="card">
                            <h6 style="text-align: center; margin-top: 1rem;">Barang Masuk & Keluar Tahun {{date('Y')}}</h6>
                            <div style="min-height: 230px; height: 300px; max-height: 300px; max-width: 100%; background-color:#ffff;">
                                <canvas id="myChart2" style="min-height: 230px; height: 300px; max-height: 300px; max-width: 100%; background-color:#ffff;"></canvas>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 mb-4 mt-2">
                            <div class="card" style="padding: 2rem;">
                                <h6 style="text-align: center; margin-top: 1rem;">Presentase Barang Masuk</h6>
                                <table id="barang_masuk" class="datatables-users table border-top">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Nama Produk</th>
                                            <th>Presentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $x=1 @endphp
                                        @php $jumlah_barang_masuk = count($barang_masuk) @endphp
                                        @foreach($barang_masuk as $data) 
                                            <tr>
                                                @php $presentase = ($data->jumlah / $jumlah_barang_masuk) * 100 @endphp
                                                <td>{{$x++}}</td>
                                                <td>{{$data->kode_inventori}}</td>
                                                <td>{{$data->nama_barang}}</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$presentase}}%" aria-valuenow="{{$presentase}}" aria-valuemin="0" aria-valuemax="100">{{$presentase}}%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-4 mt-2">
                            <div class="card" style="padding: 2rem;">
                                <h6 style="text-align: center; margin-top: 1rem;">Presentase Barang Keluar</h6>
                                <table id="barang_keluar" class="datatables-users table border-top">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Nama Produk</th>
                                            <th>Presentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $z=1 @endphp
                                        @php $jumlah_barang_keluar = count($barang_keluar) @endphp

                                        @foreach($barang_keluar as $data) 
                                            <tr>
                                                @php $presentase = ($data->jumlah / $jumlah_barang_keluar) * 100 @endphp
                                                <td>{{$z++}}</td>
                                                <td>{{$data->kode_inventori}}</td>
                                                <td>{{$data->nama_barang}}</td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$presentase}}%" aria-valuenow="{{$presentase}}" aria-valuemin="0" aria-valuemax="100">{{$presentase}}%</div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
<!-- Vendors JS -->
<script src="{{ asset('/') }}assets/vendor/libs/apex-charts/apexcharts.js"></script>
<!-- Page JS -->
<script src="{{ asset('/') }}assets/js/dashboards-ecommerce.js"></script>

{{-- Chart --}}
<script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    // Data dummy untuk barang masuk dan keluar
    var data_barang_masuk = [
        { bulan: 1, jumlah: 120 },
        { bulan: 2, jumlah: 150 },
        { bulan: 3, jumlah: 180 },  
        // ... tambahkan data lainnya ...
    ];
    var data_barang_keluar = [
        { bulan: 1, jumlah: 80 },
        { bulan: 2, jumlah: 110 },
        { bulan: 3, jumlah: 90 },
        // ... tambahkan data lainnya ...
    ];
    
    var labels = data_barang_masuk.map(bulan => {
        var date = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        return date[bulan.bulan - 1];
    });

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Barang Masuk <?= date('Y') ?>',
                data: data_barang_masuk.map(dbm => dbm.jumlah),
                backgroundColor: 'rgba(243,187,150,1)',
                borderColor: 'rgba(243,187,150,1)',
                borderWidth: 1
            }, {
                label: 'Barang Keluar <?= date('Y') ?>',
                data: data_barang_keluar.map(dbk => dbk.jumlah),
                backgroundColor: 'rgba(153,153,102,1)',
                borderColor: 'rgba(153,153,102,1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection
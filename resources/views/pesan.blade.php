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
                            <h5 class="card-title">List Pesan</h5>

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
                    </div>
                    <div class="card-datatable table-responsive">
                        <table class="datatables-users table border-top">
                            <thead>
                                <tr>

                                    <th>Nama Barang</th>
                                    <th>Tanggal</th>
                                    <th>Pesan</th>

                                </tr>
                            </thead>




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

<script>
    $(document).ready(function() {
        $(function() {
            let t, a, n;
            n = (isDarkStyle ?
                ((t = config.colors_dark.borderColor),
                    (a = config.colors_dark.bodyBg),
                    config.colors_dark) :
                ((t = config.colors.borderColor),
                    (a = config.colors.bodyBg),
                    config.colors)
            ).headingColor;
            var e,
                s = $(".datatables-users"),
                o = $(".select2"),
                r = "app-user-view-account.html",
                l = {
                    1: {
                        title: "Pending",
                        class: "bg-label-warning"
                    },
                    2: {
                        title: "Active",
                        class: "bg-label-success"
                    },
                    3: {
                        title: "Inactive",
                        class: "bg-label-secondary"
                    }
                };
            o.length &&
                (o = o).wrap('<div class="position-relative"></div>').select2({
                    placeholder: "Select Country",
                    dropdownParent: o.parent()
                }),
                s.length &&
                (e = s.DataTable({
                    ajax: "{{ route('pesan.get_all_pesan') }}",
                    columns: [{
                            data: "id",
                        }, {
                            data: 'tanggal',
                            name: 'tanggal'
                        },
                        {
                            data: 'pesan',
                            name: 'pesan'
                        },
                        // {
                        //     data: 'status_barang',
                        //     name: 'status_barang',
                        // },
                    ],
                    columnDefs: [{
                            className: "control",
                            searchable: !1,
                            orderable: !1,
                            responsivePriority: 2,

                            render: function(e, t, a, n) {
                                return "";
                            },
                        },
                        {
                            targets: 0,
                            responsivePriority: 4,
                            render: function(e, t, a, n) {
                                var s = a.nama_barang;
                                // o = a.satuan_barang;
                                return (s.toString());
                            },
                        },
                        {
                            targets: 1,
                            responsivePriority: 4,
                            render: function(e, t, a, n) {
                                var s = a.created_at;
                                var tanggal = s.split('T');
                                return (tanggal[0]);
                            },
                        },
                        {
                            targets: 2,
                            responsivePriority: 4,
                            render: function(e, t, a, n) {
                                var s = a.pesan;
                                return (s);
                            },
                        },
                        // {
                        //     targets: 3,
                        //     responsivePriority: 4,
                        //     searchable: !1,
                        //     orderable: !1,
                        //     render: function(e, t, a, n) {
                        //         var s = a.status_barang;
                        //         var status = "";
                        //         var checked = "checked"

                        //         if (s == 1) {
                        //             status = "Aktif";
                        //         } else {
                        //             checked = "";
                        //             status = "Tidak aktif";
                        //         }

                        //         // return (
                        //         //     '<span class = "badge rounded-pill bg-' +
                        //         //     badge + '">' + status + '</span>'
                        //         // );

                        //         return ('<label class="switch"><input data-id="' + a
                        //             .id +
                        //             '" id="activate-acc" type="checkbox" class="switch-input"' +
                        //             checked +
                        //             '/><span class="switch-toggle-slider"><span class="switch-on"></span><span class="switch-off"></span></span><span class="switch-label switch-activate" id="switch-activate" >' +
                        //             status + '</span></label>')
                        //     },
                        // },
                    ],
                    order: [
                        [1, "desc"]
                    ],
                    dom: '<"row mx-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    language: {
                        sLengthMenu: "_MENU_",
                        search: "",
                        searchPlaceholder: "Cari.."
                    },
                    buttons: [{
                        extend: "collection",
                        className: "btn btn-label-secondary dropdown-toggle mx-3",
                        text: '<i class="bx bx-upload me-1"></i>Export',
                        buttons: [{
                                extend: "print",
                                text: '<i class="bx bx-printer me-2" ></i>Print',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                    format: {
                                        body: function(e, t, a) {
                                            var n;
                                            return e.length <= 0 ?
                                                e :
                                                ((e = $.parseHTML(e)),
                                                    (n = ""),
                                                    $.each(e, function(e, t) {
                                                        void 0 !== t
                                                            .classList &&
                                                            t.classList
                                                            .contains(
                                                                "user-name"
                                                            ) ?
                                                            (n +=
                                                                t.lastChild
                                                                .firstChild
                                                                .textContent
                                                            ) :
                                                            void 0 ===
                                                            t.innerText ?
                                                            (n += t
                                                                .textContent
                                                            ) :
                                                            (n += t
                                                                .innerText);
                                                    }),
                                                    n);
                                        }
                                    }
                                },
                                customize: function(e) {
                                    $(e.document.body)
                                        .css("color", n)
                                        .css("border-color", t)
                                        .css("background-color", a),
                                        $(e.document.body)
                                        .find("table")
                                        .addClass("compact")
                                        .css("color", "inherit")
                                        .css("border-color", "inherit")
                                        .css("background-color", "inherit");
                                }
                            },
                            {
                                extend: "csv",
                                text: '<i class="bx bx-file me-2" ></i>Csv',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                    format: {
                                        body: function(e, t, a) {
                                            var n;
                                            return e.length <= 0 ?
                                                e :
                                                ((e = $.parseHTML(e)),
                                                    (n = ""),
                                                    $.each(e, function(e, t) {
                                                        void 0 !== t
                                                            .classList &&
                                                            t.classList
                                                            .contains(
                                                                "user-name"
                                                            ) ?
                                                            (n +=
                                                                t.lastChild
                                                                .firstChild
                                                                .textContent
                                                            ) :
                                                            void 0 ===
                                                            t.innerText ?
                                                            (n += t
                                                                .textContent
                                                            ) :
                                                            (n += t
                                                                .innerText);
                                                    }),
                                                    n);
                                        }
                                    }
                                }
                            },
                            {
                                extend: "excel",
                                text: '<i class="bx bxs-file-export me-2"></i>Excel',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                    format: {
                                        body: function(e, t, a) {
                                            var n;
                                            return e.length <= 0 ?
                                                e :
                                                ((e = $.parseHTML(e)),
                                                    (n = ""),
                                                    $.each(e, function(e, t) {
                                                        void 0 !== t
                                                            .classList &&
                                                            t.classList
                                                            .contains(
                                                                "user-name"
                                                            ) ?
                                                            (n +=
                                                                t.lastChild
                                                                .firstChild
                                                                .textContent
                                                            ) :
                                                            void 0 ===
                                                            t.innerText ?
                                                            (n += t
                                                                .textContent
                                                            ) :
                                                            (n += t
                                                                .innerText);
                                                    }),
                                                    n);
                                        }
                                    }
                                }
                            },
                            {
                                extend: "pdf",
                                text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                    format: {
                                        body: function(e, t, a) {
                                            var n;
                                            return e.length <= 0 ?
                                                e :
                                                ((e = $.parseHTML(e)),
                                                    (n = ""),
                                                    $.each(e, function(e, t) {
                                                        void 0 !== t
                                                            .classList &&
                                                            t.classList
                                                            .contains(
                                                                "user-name"
                                                            ) ?
                                                            (n +=
                                                                t.lastChild
                                                                .firstChild
                                                                .textContent
                                                            ) :
                                                            void 0 ===
                                                            t.innerText ?
                                                            (n += t
                                                                .textContent
                                                            ) :
                                                            (n += t
                                                                .innerText);
                                                    }),
                                                    n);
                                        }
                                    }
                                }
                            },
                            {
                                extend: "copy",
                                text: '<i class="bx bx-copy me-2" ></i>Copy',
                                className: "dropdown-item",
                                exportOptions: {
                                    columns: [0, 1, 2, 3],
                                    format: {
                                        body: function(e, t, a) {
                                            var n;
                                            return e.length <= 0 ?
                                                e :
                                                ((e = $.parseHTML(e)),
                                                    (n = ""),
                                                    $.each(e, function(e, t) {
                                                        void 0 !== t
                                                            .classList &&
                                                            t.classList
                                                            .contains(
                                                                "user-name"
                                                            ) ?
                                                            (n +=
                                                                t.lastChild
                                                                .firstChild
                                                                .textContent
                                                            ) :
                                                            void 0 ===
                                                            t.innerText ?
                                                            (n += t
                                                                .textContent
                                                            ) :
                                                            (n += t
                                                                .innerText);
                                                    }),
                                                    n);
                                        }
                                    }
                                }
                            }
                        ]
                    }]
                })),
                $(".datatables-users tbody").on("click", ".delete-record", function(e) {

                }),
                $(".datatables-users tbody").on("click", ".btn-edit", function(e) {

                })
        })();

    });
</script>

@if ($message = Session::get('success'))
<script>
    swal({
        title: "{{ $message }}",
        icon: "success",
        button: "Ok!",
    });
</script>
@endif
@endsection
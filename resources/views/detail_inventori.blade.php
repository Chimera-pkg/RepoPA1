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


                        <a class="btn btn-danger mb-3" href="{{ route('inventori') }}"><i
                                class="bx bx-arrow-back me-0 me-lg-2"></i><span
                                class="d-none d-lg-inline-block">Kembali</span></a>

                        <!-- Users List Table -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h5 class="card-title">Detail Kelola {{ $inventory->nama_bahan }}</h5>



                                <div class="row">



                                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <div class="avatar avatar-md mx-auto mb-3">
                                                    <span class="avatar-initial rounded-circle bg-label-info"><i
                                                            class='bx bxs-cabinet'></i></span>
                                                </div>
                                                <span class="d-block mb-1 text-nowrap">Stok Bahan</span>
                                                <h4 class="mb-0">
                                                    {{ $inventory->stok_bahan . ' ' . $inventory->satuan_bahan }}</h4>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                {{-- <h1>asdsad</h1> --}}

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
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif --}}

                                <div class="d-flex justify-content-between align-items-center row  gap-3 gap-md-0">
                                    <div class="col-md-4 user_role"></div>

                                </div>
                            </div>
                            <div class="card-datatable table-responsive">
                                <table class="datatables-users table border-top">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Stok</th>
                                            <th>Gudang</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Kelola</th>
                                            <th>Harga</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>




                                </table>
                            </div>

                            @include('offcanvas.edit_kelola_stok')
                            @include('offcanvas.kelola_stok')

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

    {{-- <script>
        $(document).ready(function() {
            $("#submitBtn").click(function() {
                $("#addNewUserForm").submit(); // Submit the form
            });
        });
    </script> --}}





    <script>
        $(document).ready(function() {
            $(function() {

                    var segment3 = "{{ $segments[2] }}";
                    // alert(segment3)
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


                            ajax: "/inventori/get_detail_penggunaan/" + segment3,
                            columns: [{
                                    data: "id",
                                }, {
                                    data: 'stok_berubah',
                                    name: 'stok'
                                },
                                {
                                    data: 'name',
                                    name: 'gudang'
                                },
                                {
                                    data: 'keterangan',
                                    name: 'keterangan',
                                },
                                {
                                    data: 'tanggal_kelola',
                                    name: 'tanggal_kelola',
                                },
                                {
                                    data: 'harga',
                                    name: 'harga',
                                },
                                {
                                    data: 'action',
                                },
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
                                        var s = a.id;
                                        // o = a.satuan_bahan;
                                        return (s.toString());
                                    },
                                },
                                {
                                    targets: 1,
                                    responsivePriority: 4,
                                    render: function(e, t, a, n) {
                                        var s = a.status;
                                        var o = a.stok_berubah;

                                        var hasil = "";
                                        if (s == 1) {
                                            hasil =
                                                " <i class='bx bx-trending-up' style='color: green'></i>";
                                        } else {
                                            hasil =
                                                " <i class='bx bx-trending-down' style='color: red'></i>";
                                        }


                                        return ("<span>" + o + "</span>" + hasil);
                                    },
                                },

                                {
                                    targets: 3,
                                    responsivePriority: 4,
                                    render: function(e, t, a, n) {
                                        var keterangan = a.keterangan

                                        var target = '/assets/img/nota/'
                                        var nota = a.nota

                                        var result = "<p>" + keterangan +
                                            "</p>"

                                        if (a.status == 1) {
                                            result += "<a class='btn btn-primary' href='" +
                                                target + nota +
                                                "' target='_blank' download>Lihat Nota</a>"
                                        }
                                        // o = a.satuan_bahan;


                                        return (result);
                                    },
                                },

                                {
                                    targets: 4,
                                    render: function(e, t, a, n) {
                                        var s = a.tanggal_kelola;
                                        var date = new Date(s);

                                        // Format the date with the time and the month name
                                        var formatter = new Intl.DateTimeFormat('id-ID', {
                                            year: 'numeric',
                                            month: 'long',
                                            day: 'numeric',
                                            hour: 'numeric',
                                            minute: 'numeric',
                                            hour12: false
                                        });
                                        var formattedDate = formatter.format(date);

                                        return formattedDate;
                                    },
                                },
                                {
                                    targets: 5,
                                    responsivePriority: 4,
                                    render: function(e, t, a, n) {
                                        var angka = a.harga
                                        // o = a.satuan_bahan;
                                        var reverse = angka.toString().split('').reverse().join(
                                            '');
                                        var ribuan = reverse.match(/\d{1,3}/g);
                                        ribuan = ribuan.join('.').split('').reverse().join('');
                                        // return 'Rp ' + ribuan;

                                        return ('Rp' + ribuan);
                                    },
                                },
                                {
                                    targets: -1,
                                    title: "Actions",
                                    searchable: !1,
                                    orderable: !1,
                                    render: function(e, t, a, n) {
                                        var s = "/inventori/delete_inventory_use/" + a.id;

                                        return (
                                            '<div class="d-inline-block text-nowrap"><a class="btn btn-sm btn-icon delete-record" href="' +
                                            s + '"><i class="bx bx-trash"></i></a>'
                                        );
                                    },
                                }

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
                                                columns: [0, 1, 2, 3, 4, 5, 6],
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
                                                columns: [0, 1, 2, 3, 4, 5, 6],
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
                                                columns: [0, 1, 2, 3, 4, 5, 6],
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
                                                columns: [0, 1, 2, 3, 4, 5, 6],
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
                                                columns: [0, 1, 2, 3, 4, 5, 6],
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
                                },
                                {
                                    text: '<i class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">Kelola Stok</span>',
                                    className: "add-new btn btn-primary",
                                    attr: {
                                        "data-bs-toggle": "offcanvas",
                                        "data-bs-target": "#offcanvasAddUser"
                                    }
                                },



                            ],
                            responsive: {
                                details: {
                                    display: $.fn.dataTable.Responsive.display.modal({
                                        header: function(e) {
                                            return "Details of " + e.data().full_name;
                                        }
                                    }),
                                    type: "column",
                                    renderer: function(e, t, a) {
                                        a = $.map(a, function(e, t) {
                                            return "" !== e.title ?
                                                '<tr data-dt-row="' +
                                                e.rowIndex +
                                                '" data-dt-column="' +
                                                e.columnIndex +
                                                '"><td>' +
                                                e.title +
                                                ":</td> <td>" +
                                                e.data +
                                                "</td></tr>" :
                                                "";
                                        }).join("");
                                        return (
                                            !!a &&
                                            $('<table class="table"/><tbody />').append(a)
                                        );
                                    }
                                }
                            },
                        })),
                        $(".datatables-users tbody").on("click", ".delete-record", function(e) {

                            const url = $(this).attr('href');
                            // var token = $(this).value("token");
                            e.preventDefault();
                            // swal({
                            //     title: "Are you sure you want to delete this record?",
                            //     text: "If you delete this, it will be gone forever.",
                            //     icon: "warning",
                            //     type: "warning",
                            //     buttons: ["Cancel", "Yes!"],
                            //     confirmButtonColor: '#3085d6',
                            //     cancelButtonColor: '#d33',
                            //     confirmButtonText: 'Yes, delete it!'
                            // }).then((willDelete) => {
                            //     if (willDelete) {
                            //         window.location.href = url;
                            //         // alert(url)
                            //     }
                            // });

                            swal({
                                    title: "Are you sure you want to delete this record?",
                                    text: "If you delete this, it will be gone forever.",
                                    icon: "warning",
                                    buttons: ["Batal", "Ya!"],
                                    dangerMode: true,
                                    confirmButtonText: 'Ya, hapus data itu!'
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = url;
                                    } else {
                                        swal("Data batal dihapus!");
                                    }
                                });


                        }),
                        $(".datatables-users tbody").on("click", ".btn-edit", function(e) {

                            $('#editKelolaStok')[0].reset();

                            var stok_berubah = $(this).data('stok');
                            var tanggal = $(this).data('tanggal');
                            var status = $(this).data('status');
                            var keterangan = $(this).data('keterangan');

                            $(".offcanvas-body #stok").val(stok_berubah);
                            $(".offcanvas-body #tanggal_kelola").val(tanggal);
                            $(".offcanvas-body #status_edit").val(status);
                            $(".offcanvas-body #keterangan").val(keterangan);

                            if (status == 1) {

                                var harga = $(this).data('harga');
                                $(".offcanvas-body #harga").val(harga);

                                $('#addFieldEdit').show();

                                // Aktifkan validasi untuk field nama

                            } else {
                                $(".offcanvas-body #harga").val("");
                                $(".offcanvas-body #nota").val("");
                                $('#addFieldEdit').hide();

                            }



                        }),
                        $('#status_edit').on('change', function() {
                            var selectedValue = $(this).val();
                            // alert(selectedValue)
                            if (selectedValue == 1) {
                                $('#addFieldEdit').show();
                                // Aktifkan validasi untuk field nama

                            } else {
                                $(".offcanvas-body #harga").val("");
                                $(".offcanvas-body #nota").val("");
                                $('#addFieldEdit').hide();

                            }
                        });
                    $(".datatables-users tbody").on("click", ".switch", function(e) {

                            e.preventDefault();
                            var id = $(this).find('.switch-input').data('id');

                            // switch-label
                            var label = $(this).find('.switch-activate').html().trim();

                            // alert(id)

                            if (label === "Aktif") {
                                $(this).find('.switch-activate').html(
                                    "Tidak aktif"
                                );
                                $(this).find('.switch-input').attr('checked', false);
                            } else if (label === "Tidak aktif") {
                                $(this).find('.switch-activate').html(
                                    "Aktif");
                                $(this).find('.switch-input').attr('checked', true);
                            }


                            $.ajax({
                                url: '/inventori/update_status/' + id,
                                method: 'GET',
                                success: function(response) {
                                    // Handle success response
                                    console.log(response);
                                },
                                error: function(response) {
                                    // Handle error response
                                    console.log(response);
                                }
                            });

                        }),

                        $(".add-new").on("click", function(e) {

                            $('#addNewUserForm')[0].reset();
                            // alert('aok')
                            // As pointed out in comments, 
                            // it is unnecessary to have to manually call the modal.
                            // $('#addBookDialog').modal('show');

                        }),
                        setTimeout(() => {
                            $(".dataTables_filter .form-control").removeClass(
                                    "form-control-sm"
                                ),
                                $(".dataTables_length .form-select").removeClass(
                                    "form-select-sm"
                                );
                        }, 300);
                }),
                (function() {
                    // c.preventDefault();

                    // const field

                    const existingValidations = {
                        keterangan: {
                            validators: {
                                notEmpty: {
                                    message: "Masukkan keterangan"
                                }
                            }
                        },
                        status: {
                            validators: {
                                notEmpty: {
                                    message: "Masukkan status kegunaan stok barang"
                                }
                            }
                        },
                        tanggal_kelola: {
                            validators: {
                                notEmpty: {
                                    message: "Masukkan tanggal kelola stok barang"
                                }
                            }
                        },
                        stok: {
                            validators: {
                                notEmpty: {
                                    message: "Masukkan jumlah stok"
                                },
                                numeric: {
                                    message: "Masukkan angka untuk jumlah stok"
                                },
                                between: {
                                    min: 1,
                                    max: 10000,
                                    message: "Jumlah stok harus di antara 1 dan 10.000"
                                }
                            }
                        }
                    };


                    $('#status').on('change', function() {
                        var selectedValue = $(this).val();
                        // alert(selectedValue)
                        if (selectedValue == 1) {

                            $('#addField').show();
                            // Aktifkan validasi untuk field nama

                        } else {
                            $(".offcanvas-body #harga").val("");
                            $(".offcanvas-body #nota").val("");



                            $('#addField').hide();

                        }
                    });

                    var e = document.querySelectorAll(".phone-mask"),
                        t = document.getElementById("addNewUserForm");
                    e &&
                        e.forEach(function(e) {
                            new Cleave(e, {
                                phone: !0,
                                phoneRegionCode: "US"
                            });
                        }),
                        FormValidation.formValidation(t, {
                            fields: existingValidations,
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger(),
                                bootstrap5: new FormValidation.plugins.Bootstrap5({
                                    eleValidClass: "",
                                    rowSelector: function(e, t) {
                                        return ".mb-3";
                                    }
                                }),
                                submitButton: new FormValidation.plugins.SubmitButton(),
                                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                                autoFocus: new FormValidation.plugins.AutoFocus()
                            }
                        });




                })(),
                (function() {
                    // c.preventDefault();
                    var e = document.querySelectorAll(".phone-mask"),
                        t = document.getElementById("editKelolaStok");
                    e &&
                        e.forEach(function(e) {
                            new Cleave(e, {
                                phone: !0,
                                phoneRegionCode: "US"
                            });
                        }),
                        FormValidation.formValidation(t, {
                            fields: {
                                keterangan: {
                                    validators: {
                                        notEmpty: {
                                            message: "Masukkan keterangan"
                                        }
                                    }
                                },
                                status_edit: {
                                    validators: {
                                        notEmpty: {
                                            message: "Masukkan status kegunaan stok barang"
                                        }
                                    }
                                },
                                tanggal_kelola: {
                                    validators: {
                                        notEmpty: {
                                            message: "Masukkan tanggal kelola stok barang"
                                        }
                                    }
                                },
                                stok: {
                                    validators: {
                                        notEmpty: {
                                            message: "Masukkan jumlah stok"
                                        },
                                        numeric: {
                                            message: "Masukkan angka untuk jumlah stok"
                                        },
                                        between: {
                                            min: 1,
                                            max: 10000,
                                            message: "Jumlah stok harus di antara 1 dan 10.000"
                                        }

                                    }
                                },

                                // nota: {
                                //     validators: {
                                //         notEmpty: {
                                //             message: "Masukkan gambar nota"
                                //         },
                                //         file: {
                                //             maxSize: 10 * 1024 * 1024, // 10 MB
                                //             minSize: 1024, // 1 KB
                                //             messageExtension: 'Format file tidak sesuai',
                                //             messageSize: 'Ukuran file harus di antara 1 KB dan 10 MB'
                                //         }
                                //     }
                                // },

                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger(),
                                bootstrap5: new FormValidation.plugins.Bootstrap5({
                                    eleValidClass: "",
                                    rowSelector: function(e, t) {
                                        return ".mb-3";
                                    }
                                }),
                                submitButton: new FormValidation.plugins.SubmitButton(),
                                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                                autoFocus: new FormValidation.plugins.AutoFocus()
                            }
                        });

                    $('#status').on('change', function() {
                        var selectedValue = $(this).val();
                        // alert(selectedValue)
                        if (selectedValue == 1) {
                            $('#addField').show();
                            // Aktifkan validasi untuk field nama

                        } else {
                            $(".offcanvas-body #harga").val("");
                            $(".offcanvas-body #nota").val("");
                            $('#addField').hide();

                        }
                    });


                })();

        });
    </script>


    <script></script>

    @if ($message = Session::get('success'))
        <script>
            swal({
                title: "{{ $message }}",
                icon: "success",
                button: "Ok!",
            });
        </script>
    @endif


    @if ($message = Session::get('error'))
        <script>
            swal({
                title: "{{ $message }}",
                icon: "error",
                text: "Terjadi kesalahan. Silakan coba lagi nanti.",
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

    @if ($errors->hasBag('errorEdit'))
        <script>
            $(document).ready(function() {
                $('#offcanvasEditUser').offcanvas('show')
                $('#addFieldEdit').show()
            });
        </script>
    @endif
@endsection

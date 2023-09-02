<!doctype html>
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('/') }}assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title }}</title>


    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 admin, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/frest_admin">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/frest-html-admin-template/assets/img/favicon/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/chart/dist/Chart.min.css">
    <script type="text/javascript" src="{{ asset('/') }}assets/chart/dist/Chart.min.js"> </script>
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/demo.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/demo.css" />


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js"></script>

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />


    <!-- Helpers -->
    <script src="{{ asset('/') }}assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('/') }}assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/') }}assets/js/config.js"></script>

    @yield('addStyle')
    <style>
        ul,
        #myUL {
            list-style-type: none;
        }

        #myUL {
            margin: 0;
            padding: 0;
        }

        .caret {
            cursor: pointer;
            -webkit-user-select: none;
            /* Safari 3.1+ */
            -moz-user-select: none;
            /* Firefox 2+ */
            -ms-user-select: none;
            /* IE 10+ */
            user-select: none;
        }

        .caret::before {
            content: "\2039";
            font-size: 23px;
            color: black;
            display: inline-block;
            margin-right: 6px;
            margin-left: 1rem;
            color: #677788;
        }

        .caret-down::before {
            -ms-transform: rotate(-90deg);
            /* IE 9 */
            -webkit-transform: rotate(-90deg);
            /* Safari */

            transform: rotate(-90deg);
        }

        .nested {
            display: none;
        }

        .active {
            display: block;
        }
    </style>
</head>

<body>


    @yield('content')

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    {{-- <script src="{{ asset('/') }}assets/vendor/libs/jquery/jquery.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('/') }}assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('/') }}assets/vendor/libs/hammer/hammer.js"></script>

    <script src="{{ asset('/') }}assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('/') }}assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('/') }}assets/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('/') }}assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="modal fade" id="detail_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div id="page"></div>
    </div>
    @yield('addScript')

    <script>
        $(document).ready(function() {
            $('.treeview ul').hide(); // Semua submenu disembunyikan awalnya
            $('.treeview li').click(function(e) {
                e.stopPropagation();
                $(this).children('ul').slideToggle();
            });
        });
    </script>

    <form action="" id="delete-form" method="POST">
        @method('delete')
        @csrf
    </form>

    <script>
        $(document).ready(function() {

            $('#barang_masuk').DataTable({
                paging: true,
            });
            $('#barang_keluar').DataTable({
                paging: true,
            });
            $('#myTable').DataTable({
                paging: true,
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
                }],
            });
            $('#myTable2').DataTable({
                paging: true,
                search: "",
                searchPlaceholder: "Cari.."
            });
        });
    </script>


    <script>
        function notificationforDelete(event, el) {
            event.preventDefault();
            swal.fire({
                title: "Apakah Anda Yakin Menghapus Data Ini?",
                icon: "warning",
                closeOnClickOutside: false,
                showCancelButton: true,
                confirmButtonText: 'Iya',
                confirmButtonColor: '#6777ef',
                cancelButtonText: 'Batal',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.value) {
                    $("#delete-form").attr('action', $(el).attr('href'));
                    $("#delete-form").submit();
                }
            });
        }


        function show(url) {
            $.get(url, function(data) {
                $("#page").html(data);
                $('#detail_modal').modal('show');
            });
        }
    </script>

</body>

</html>
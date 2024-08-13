<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | SIALUMNI</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .select2-container .select2-selection--single {
            border: 1px solid rgb(231, 231, 231);
            /* Light gray border */
            border-radius: 4px;
            /* Rounded corners */
            padding-left: 5px;
            /* Uniform padding for top, bottom, and left */
            padding-top: 10px;
            /* Uniform padding for top, bottom, and left */
            height: auto;
            /* Allow height to adjust based on padding */
            min-height: 40px;
            /* Ensure a minimum height */
            box-sizing: border-box;
            /* Include padding in the height calculation */
        }

        /* Custom border for Select2 focus state */
        .select2-container--default .select2-selection--single:focus,
        .select2-container--default .select2-selection--single .select2-selection__rendered:focus {
            border-color: rgb(200, 200, 200);
            /* Slightly darker gray on focus */
            outline: none;
            /* Remove default outline */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            /* Bootstrap-like shadow on focus */
        }

        /* Ensure the dropdown itself matches the style */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            /* Ensure the arrow height matches the container */
            right: 10px;
            /* Adjust positioning of the arrow */
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIALUMNI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @yield('menuDashboard')">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            @if (Auth()->user()->level_id == '1')
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link @yield('menuDataMaster') collapsed" href="#" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Master</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Fitur-Fitur:</h6>
                            <a class="collapse-item @yield('menuDataPengurus')"
                                href="{{ route('data-pengurus.index') }}">Pengurus</a>
                            <a class="collapse-item @yield('menuDataJurusan')"
                                href="{{ route('data-jurusan.index') }}">Jurusan</a>
                            <a class="collapse-item @yield('menuDataAlumni')"
                                href="{{ route('data-alumni.index') }}">Alumni</a>
                            <a class="collapse-item @yield('menuDataPekerjaan')"
                                href="{{ route('data-pekerjaan.index') }}">Pekerjaan</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link @yield('menuDataKegiatan') collapsed" href="#" data-toggle="collapse"
                        data-target="#data-kegiatan" aria-expanded="true" aria-controls="data-kegiatan">
                        <i class="fas fa-fw fa-calendar"></i>
                        <span>Data Kegiatan</span>
                    </a>
                    <div id="data-kegiatan" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Fitur-Fitur:</h6>
                            <a class="collapse-item @yield('menuDataAcara')" href="{{ route('data-acara.index') }}">Acara</a>
                            <a class="collapse-item @yield('menuDataBerita')"
                                href="{{ route('data-berita.index') }}">Berita</a>
                            <a class="collapse-item @yield('menuDataDonasi')"
                                href="{{ route('data-donasi.index') }}">Donasi</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link @yield('menuDataAutentikasi') collapsed" href="#" data-toggle="collapse"
                        data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Data Autentikasi</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Fitur-Fitur:</h6>
                            <a class="collapse-item @yield('menuDataStatusAutentikasi')" href="{{ route('data-level.index') }}">Status
                                Autentikasi</a>
                            <a class="collapse-item @yield('menuDataUsersRegistrasi')" href="{{ route('data-user.index') }}">Users
                                Registrasi</a>
                        </div>
                    </div>
                </li>
            @elseif (Auth()->user()->level_id == '2')
                <li class="nav-item @yield('menuPengurusAcara')">
                    <a class="nav-link" href="{{ route('pengurus-acara.index') }}">
                        <i class="fas fa-fw fa-calendar-alt"></i>
                        <span>Data Acara</span></a>
                </li>
                <li class="nav-item @yield('menuPengurusBerita')">
                    <a class="nav-link" href="{{ route('pengurus-berita.index') }}">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Data Acara</span></a>
                </li>
                <li class="nav-item @yield('menuPengurusDonasi')">
                    <a class="nav-link" href="{{ route('pengurus-donasi.index') }}">
                        <i class="fas fa-fw fa-wallet"></i>
                        <span>Data Donasi</span></a>
                </li>
                <li class="nav-item @yield('menuPengurusAlumni')">
                    <a class="nav-link" href="{{ route('pengurus-alumni.index') }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data Alumni</span></a>
                </li>
            @elseif (Auth()->user()->level_id == '3')
                <li class="nav-item @yield('menuAlumniAcara')">
                    <a class="nav-link" href="{{ route('alumni-acara.index') }}">
                        <i class="fas fa-fw fa-calendar-alt"></i>
                        <span>Data Acara</span></a>
                </li>
                <li class="nav-item @yield('menuAlumniDonasi')">
                    <a class="nav-link" href="{{ route('alumni-donasi.index') }}">
                        <i class="fas fa-fw fa-wallet"></i>
                        <span>Data Donasi</span></a>
                </li>
            @endif

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth()->user()->name ?? '-' }}</span>
                                @if (Auth()->user()->foto_profile)
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('storage/' . Auth()->user()->foto_profile) }}">
                                @else
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('admin/img/undraw_profile.svg') }}">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('setting.index') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIALUMNI {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah ini jika anda ingin keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="{{ route('login.logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    @stack('custom-script')
</body>

</html>
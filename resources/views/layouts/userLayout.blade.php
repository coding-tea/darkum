<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="darkum is a website that help people find an appartment in a easy way">
    <meta name="author" content="BornToCode">

    <title> @yield('title') </title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield("link")

    <style>
        .butthons button{
            outline: none;
            border: none;
            color: #2e59d9;
            background: none;
        }
        .butthons a{
            margin-right: 10px;
            color: #2e59d9;
        }

        .table tr .title{
            letter-spacing: 1px;
            color: #2e59d9;
            font-weight: bold;
            font-size: 15px;
        }
        .table .annonce{
            padding: 10px 20px;
        }

        .table{
            padding: 10px 20px;
        }
        .nav-link{
            color: none;
            /* #d1d3e2 */
        }
        
        .topbar.navbar-light .navbar-nav .nav-item .nav-link {
            color: rgba(0, 0, 0, 0.4);
        }

        .section-text{
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .mb-3 select{
            width: 100%;
            color: #6e707e;
            background-color: #fff;
            border: 1px solid #d1d3e2;
            padding: 7px 20px;
            border-radius: .35rem;
            outline: none;
        }

        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            width: 100%;
            text-align: center;
            background-color: #59698d;
            color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            display: inline-block;
            padding: 9px 30px;
            cursor: pointer;
            transition: .2s ease;
        }

        .custom-file-upload:hover{
            background-color: #fff;
            border: 1px solid #59698d;
            color: #59698d;
        }
        #addLocation{
        display: block;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        width: 99%;
        border-radius: 10px;
        background-color: #59698d; 
        color:#FFF

      }
          #map { height: 350px }

        .active{
            color: white;
        }
    </style>

    {{-- cdnjs font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white topbar mb-4 static-top shadow">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

                    <div class="collapse navbar-collapse" style="z-index: 1; background-color: #fff" id="navbarSupportedContent">
                        {{-- navbar links --}}
                        <ul class="navbar-nav mr-auto">
                            <!-- Nav Item - Dashboard -->
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <i class="fa-solid fa-house"></i>
                                    <span> home</span></a>
                            </li>

                            <!-- Nav Item - announces -->
                            <li class="nav-item">
                                <a class="nav-link {{(Request::is('user/announces*'))? 'text-dark' : '' }}" href=" {{ route('announces.index') }} ">
                                    <i class="fas fa-fw fa-folder"></i>
                                    <span>announces</span></a>
                            </li>

                            <!-- Nav Item - favorit -->
                            <li class="nav-item">
                                <a class="nav-link {{(Request::is('user/favorit*'))?'text-dark':'' }}" href=" {{ route('favorit.index') }} ">
                                    <i class="fa-solid fa-star"></i>
                                    <span>favorits</span></a>
                            </li>

                            <!-- Nav Item - Profile -->
                            <li class="nav-item">
                                <a class="nav-link {{(Request::is('user/profile*'))?'text-dark':'' }}" href="{{ route('profile.index') }}">
                                    <i class="fas fa-fw fa-cog"></i>
                                    <span>Profile</span></a>
                                </li>
                        </ul>

                        {{-- navbar logo --}}
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
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> @auth
                                        {{ Auth()->user()->name }}
                                    @endauth 
                                </span>
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('img/undraw_profile.svg') }}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Darkum</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-primary" type='submit' >Logout</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }} "></script>
    <script src=" {{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>

    <!-- Core plugin JavaScript-->
    <script src=" {{ asset('vendor/jquery-easing/jquery.easing.min.js') }} "></script>

    <!-- Custom scripts for all pages-->
    <script src=" {{ asset('js/sb-admin-2.min.js') }} "></script>

    <!-- Page level plugins -->
    <script src=" {{ asset('vendor/chart.js/Chart.min.js') }} "></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src=" {{ asset('js/demo/chart-pie-demo.js') }} "></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session()->has('msg'))
    @php
            echo '<script>swal({title: "Good job!",text: "'. session("msg") .'",icon: "success",button: "close!",});</script>';
            @endphp
    @endif
    
    @if (session()->has('error'))
        @php
            echo '<script>swal({title: "Failed!",text: "'. session("error") .'",icon: "error",button: "close!",});</script>';
        @endphp
    @endif

    @yield("script")
</body>
</html>
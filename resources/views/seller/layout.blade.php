<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Pastan - @yield('title')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('vendors/images/pastan-icon-180.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('vendors/images/pastan-icon-32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('vendors/images/pastan-icon-16.png')}}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/core.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/icon-font.min.css')}}">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">

    <!-- bootstrap-touchspin css -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}">
</head>

<body class="sidebar-dark header-dark">
    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
        </div>
        <div class="header-right">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            @if (Auth::user()->image_path == 'src/images/avatar.png')
                            <img src="src/images/avatar.png" alt="">
                            @else
                            <img src="{{asset('storage/'.Auth::user()->image_path)}}" alt="">
                            @endif
                        </span>
                        <span class="user-name">{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="/profileSeller"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="/logout"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Begin Sidebar -->
    <div class=" left-side-bar">
        <div class="brand-logo">
            <a href="/seller">
                <img src="vendors/images/pastan-logo.svg" alt="" class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <a href="/seller" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/item" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-cube"></span><span class="mtext">Barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="/transaction" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-money"></span><span class="mtext">Pesanan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>
    <!-- End Sidebar -->

    @yield('content')

    <!-- Begin Script -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/style.css')}}">
    <!-- js -->
    <script src="{{asset('vendors/scripts/core.js')}}"></script>
    <script src="{{asset('vendors/scripts/script.min.js')}}"></script>
    <script src="{{asset('vendors/scripts/process.js')}}"></script>
    <script src="{{asset('vendors/scripts/layout-settings.js')}}"></script>

    <script src="{{asset('src/plugins/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendors/scripts/dashboard.js')}}"></script>

    <!-- bootstrap-touchspin js -->
    <script src="{{asset('src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
    <script src="{{asset('vendors/scripts/advanced-components.js')}}"></script>

    @yield('script')
    <!-- End Script -->
</body>

</html>
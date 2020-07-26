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
            @if (Auth::check())
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        @if (count($cart_data)>=1)
                        <i class="dw dw-shopping-cart"></i>
                        <span class="badge notification-active"></span>
                        @else
                        <i class="dw dw-shopping-cart"></i>
                        @endif
                    </a>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            @if (Auth::user()->image_path == 'src/images/avatar.png')
                            <img src="src/images/avatar.png" alt="">
                            @else
                            <img src="{{asset('image/'.Auth::user()->image_path)}}" alt="">
                            @endif
                        </span>
                        <span class="user-name">{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="/profile"><i class="dw dw-user1"></i>Profile</a>
                        <a class="dropdown-item" href="/logout"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
            @else
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="/login">
                        <i class="dw dw-login"></i>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Keranjang Belanja
                <span class="btn-block font-weight-400 font-12">Berikut ini daftar bahan yang telah anda pilih</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        @if (Auth::check())
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <div class="row">
                    @foreach ($cart_data as $cdt)
                    <div class="col-12 col-lg-12 col-sm-12 col-md-12 mb-30">
                        <div class="card card-box">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        @php
                                        $image_item =
                                        \App\item::select('item_image_path')->where('item_id','=',$cdt->id_item)->first();
                                        @endphp
                                        <img src="{{asset('image/'.$image_item->item_image_path)}}"
                                            style="width:70px; height:60px">
                                    </div>
                                    <div class="col-8 col-lg-8 col-sm-8 col-md-8">
                                        <h5 class="card-title" style="margin-bottom: 5px">{{$cdt->item_name}}
                                            <a href="/deleteSpecificCart/{{$cdt->id_item}}"><i
                                                    class="ml-auto dw dw-trash"></i></a>
                                        </h5>
                                        <p class="card-text">Jumlah : {{$cdt->quantity_item}}<br>Sub Total : Rp.
                                            {{$cdt->sub_total_price}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row" style="margin-top:5px">
                                    <div class="col-6 col-lg-6 col-sm-6 col-md-6">
                                        <a href="/decrementItem/{{$cdt->id_item}}" class="btn btn-outline-info"
                                            style="width: 100%"><i class="icon-copy fa fa-minus-circle"
                                                aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-6 col-lg-6 col-sm-6 col-md-6">
                                        <a href="/incrementItem/{{$cdt->id_item}}" class="btn btn-outline-info"
                                            style="width: 100%"><i class="icon-copy fa fa-plus-circle"
                                                aria-hidden="true"></i></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
                <h4 class="weight-600 font-18 pb-10">Total Harga : Rp. {{$total_price_cart}}</h4>
                @if (count($cart_data)!=null)
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a class="btn btn-outline-danger" href="/deleteAllCartUser">Hapus</a>
                    <a class="btn btn-outline-info" href="/orderUp">Beli</a>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
    <!-- End Header -->

    <!-- Begin Sidebar -->
    <div class=" left-side-bar">
        <div class="brand-logo">
            <a href="/">
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
                        <a href="/" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-home"></span><span class="mtext">Beranda</span>
                        </a>
                    </li>
                    @if (Auth::check())
                    <li>
                        <a href="/orderBuyer" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-information"></span><span class="mtext">Status Pesanan</span>
                        </a>
                    </li>
                    @endif
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

    <!-- End Script -->
    <script>
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>

    @yield('script')
</body>

</html>
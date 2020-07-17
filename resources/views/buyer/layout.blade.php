<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Pastan - @yield('title')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('vendors/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('vendors/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('vendors/images/favicon-16x16.png')}}">

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
    <!-- Begin Header -->
    <!--
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div>
    -->
    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <!--
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
            <div class="header-search">
                <form action="/test" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group mb-0">
                                <select class="custom-select2 form-control" name="search" style="width: 100%">
                                    <option value="">Pencarian</option>
                                    @foreach ($item_data as $itd)
                                    <option value="{{$itd->item_name}}">{{$itd->item_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary" style="margin-left : -15px; padding: 10px;"><i
                                    class="dw dw-search2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
             -->
        </div>
        <div class="header-right">
            @if (Auth::check())
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-shopping-cart"></i>
                        <span class="badge notification-active"></span>
                    </a>
                </div>
            </div>
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/img.jpg" alt="">
                                        <h3>John Doe</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo1.jpg" alt="">
                                        <h3>Lea R. Frith</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo2.jpg" alt="">
                                        <h3>Erik L. Richards</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo3.jpg" alt="">
                                        <h3>John Doe</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/photo4.jpg" alt="">
                                        <h3>Renee I. Hansen</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="vendors/images/img.jpg" alt="">
                                        <h3>Vicki M. Coleman</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="vendors/images/photo1.jpg" alt="">
                        </span>
                        <span class="user-name">Ross C. Lopez</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="profile.php"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="profile.php"><i class="dw dw-settings2"></i> Setting</a>
                        <a class="dropdown-item" href="faq.php"><i class="dw dw-help"></i> Help</a>
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
                    <div class="col-12 col-sm-12 col-md-4 mb-30">
                        <div class="card card-box">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="vendors/images/img2.jpg" alt="" style="width:70px; height:60px">
                                    </div>
                                    <div class="col-8">
                                        <form action="/lol">
                                            <h5 class="card-title" style="margin-bottom: 5px">{{$cdt->item_name}}
                                                <a href="/deleteSpecificCart/{{$cdt->id_item}}"><i
                                                        class="ml-auto dw dw-trash"></i></a>
                                            </h5>
                                        </form>
                                        <p class="card-text">Jumlah : {{$cdt->quantity_item}}<br>Sub Total : Rp.
                                            {{$cdt->sub_total_price}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row" style="margin-top:5px">
                                    <div class="col-6">
                                        <button class="btn btn-outline-info" style="width: 100%"><i
                                                class="icon-copy fa fa-minus-circle" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-outline-info" style="width: 100%"><i
                                                class="icon-copy fa fa-plus-circle" aria-hidden="true"></i></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
                <h4 class="weight-600 font-18 pb-10">Total Harga : Rp. {{$total_price_cart}}</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a class="btn btn-outline-danger" href="/deleteAllCartUser">Hapus</a>
                    <a class="btn btn-outline-info">Beli</a>
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- End Header -->

    <!-- Begin Sidebar -->
    <div class=" left-side-bar">
        <div class="brand-logo">
            <a href="index.php">
                <img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
                <img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
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
                    <li>
                        <a href="/" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-question"></span><span class="mtext">Panduan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/aboutCreator" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-information"></span><span class="mtext">Tentang
                                Pastan</span>
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
    <!--
    <script type="text/javascript">
        $(document).ready(function(){
            $('#productBox').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/addToCart",
                    data: $('#productBox').serialize(),
                    success: function (response) {
                        console.log(response)
                        alert("success");
                        //do something
                    },
                    error: function(error){
                            console.log(error)
                            alert("error");
                    }
                }); 
            });
        });
    </script>
    -->
</body>

</html>
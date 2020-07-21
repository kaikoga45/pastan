<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Pastan - Reset Kata Sandi</title>

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

</head>

<body class="login-page">
    <div class="login-header box-shadow" style="background-color:#031e23">
        <div class=" container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="/login">
                    <img src="vendors/images/pastan-logo.svg" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/register-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Reset Kata Sandi Akun</h2>
                        </div>
                        <div class="alert alert-info" role="alert" style="text-align: justify">
                            Sebuah email telah dikirim ke <strong>{{ session('data_email') }}</strong>, yang berisi 6
                            digit angka.
                            Buka kotak masuk email anda, kemudian salin 6 digit angka tersebut dan tempel ke kotak bawah
                            ini untuk membantu reset kata sandi akun anda.
                        </div>
                        @if (session('NotMatch'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('NotMatch') }}!</strong>
                        </div>
                        @endif
                        <form action="/postCodeForget" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ session('data_email') }}" name="inputEmail">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Kode Verifikasi"
                                    name="code_verified" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-lock"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Script -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/styles/style.css')}}">
    <!-- js -->
    <script src="{{asset('vendors/scripts/core.js')}}"></script>
    <script src="{{asset('vendors/scripts/script.min.js')}}"></script>
    <script src="{{asset('vendors/scripts/process.js')}}"></script>
    <script src="{{asset('vendors/scripts/layout-settings.js')}}"></script>
</body>

</html>
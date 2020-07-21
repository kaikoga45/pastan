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
        <div class="container-fluid d-flex justify-content-between align-items-center">
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
                            Masukkan alamat email akun anda untuk dikirim sebuah 6 digit angka yang bisa membantu
                            mereset kata sandi akun anda.
                        </div>
                        @if (session('NotFound'))
                        <div class="alert alert-danger alert-dismissible" style="text-align: justify>
                            <a href=" #" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('NotFound') }}!</strong>
                        </div>
                        @endif
                        <form action="/postForgetCheckEmail" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Email Akun Anda"
                                    name="inputEmail" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
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
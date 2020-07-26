<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Pastan - Registrasi</title>

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
                            <h2 class="text-center text-primary">Registrasi Akun</h2>
                        </div>
                        <div class="alert alert-info" role="alert" style="text-align: justify">
                            Pastikan alamat email anda masih valid, agar kami bisa mengirimkan sebuah email ke anda!
                        </div>
                        <form action="/postRegister" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Nama Lengkap"
                                    name="name" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text"
                                    class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' :  '' }}"
                                    placeholder="Email" name="email" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
                                </div>
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>
                                @endif
                            </div>
                            <div class="input-group custom">
                                <input type="password"
                                    class="form-control form-control-lg {{ $errors->has('password') ? 'is-invalid' :  '' }}"
                                    placeholder="Kata Sandi" name="password" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </div>
                                @endif
                            </div>
                            <div class="input-group custom">
                                <input type="password"
                                    class="form-control form-control-lg {{ $errors->has('password') ? 'is-invalid' :  '' }}"
                                    placeholder="Konfirmasi Kata Sandi" name="password_confirmation" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Atau
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="/login">Batal
                                            untuk membuat akun</a>
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
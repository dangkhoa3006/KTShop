<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../assets_admin/img/logo/icon_dashboard.png" rel="icon">
    <title>Login</title>
    <link href="../assets_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    {{-- <link href="css/ruang-admin.min.css" rel="stylesheet"> --}}
    <link href="../assets_admin/css/ruang-admin.css" rel="stylesheet">
    <link href="../assets_admin/css/ktmobile-admin.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">ĐĂNG NHẬP</h1>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nhập e-mail...">
                                            <div style="color: red">
                                                @if ($errors->has('email'))
                                                    {{ $errors->first('email') }} <br>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Nhập mật khẩu...">
                                            <div style="color: red">
                                                @if ($errors->has('password'))
                                                    {{ $errors->first('password') }} <br>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small"
                                                style="line-height: 1.5rem;">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        {{-- <input type="submit"> --}}

                                        <div class="form-group">
                                            {{-- <a href="{{ route('dashboard') }}" >ĐĂNG NHẬP</a> --}}
                                            <button type="submit" class="btn btn-primary btn-block">ĐĂNG NHẬP</button>
                                        </div>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-block">
                                            <i class="fab fa-google fa-fw"></i> Đăng nhập bằng Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập bằng Facebook
                                        </a>
                                        <hr>
                                        <div class="text-center">
                                            <a class="font-weight-bold small" href="register.html">Tạo tài khoản</a>
                                        </div>
                                        <div class="text-center">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Login Content -->
    <script src="../assets_admin/vendor/jquery/jquery.min.js"></script>
    <script src="../assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets_admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets_admin/js/ruang-admin.min.js"></script>
</body>

</html>
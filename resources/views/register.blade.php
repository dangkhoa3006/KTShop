<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../assets_admin/img/logo/icon_dashboard.png" rel="icon">
    <title>ĐĂNG KÝ - KTMOBILE SHOP</title>
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
                                <form method="POST" action="{{route('registerAccount')}}">
                                    @csrf
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">ĐĂNG KÝ</h1>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Họ tên</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name') }}" placeholder="Họ tên...">
                                                <div style="color: red">
                                                    @if ($errors->has('name'))
                                                        {{ $errors->first('name') }}<br>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email"
                                                    id="inputEmail3" placeholder="Email">
                                                <div style="color: red;">
                                                    @if ($errors->has('email'))
                                                        {{ $errors->first('email') }}<br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Mật
                                                khẩu</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password"
                                                    id="inputPassword3" placeholder="Mật khẩu">
                                                <div style="color: red;">
                                                    @if ($errors->has('password'))
                                                        {{ $errors->first('password') }}<br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nhập lại mật
                                                khẩu</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password_confirmation"
                                                    id="inputPassword3" placeholder="Nhập lại mật khẩu">
                                                <div style="color: red;">
                                                    @if ($errors->has('password_confirmation'))
                                                        {{ $errors->first('password_confirmation') }}<br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">ĐĂNG kÝ</button>
                                        </div>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-block">
                                            <img src="../image/icon_google.png" alt="Login Google"
                                                style="height: 20px; margin-right: 8px;"> Đăng ký bằng Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Đăng ký bằng Facebook
                                        </a>
                                        <hr>
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

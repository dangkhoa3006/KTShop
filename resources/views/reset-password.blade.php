<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../assets_admin/img/logo/icon_dashboard.png" rel="icon">
    <title>ĐỔI MẬT KHẨU - KTMOBILE SHOP</title>
    <link href="../assets_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    {{-- <link href="css/ruang-admin.min.css" rel="stylesheet"> --}}
    <link href="../assets_admin/css/ruang-admin.css" rel="stylesheet">
    <link href="../assets_admin/css/ktmobile-admin.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login" style="margin-top: 5%">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    @if (session('success'))
                        <div id="success-alert" class="alert alert-success alert-dismissible" role="alert"
                            style="position: fixed; top: 80px; left: 63%; width: 35%;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h6><i class="fas fa-check"></i><b> Thành công!</b></h6>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div id="stop-alert" class="alert alert-danger alert-dismissible" role="alert"
                            style="position: fixed; top: 80px; left: 63%; width: 35%;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h6><i class="fas fa-ban"></i><b> Không thành công!</b></h6>
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="{{route('changePassword')}}">
                                    @csrf
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">ĐỔI MẬT KHẨU</h1>
                                        </div>
                                        <input type="text" name="token" hidden value="{{$token}}">
                                        {{-- <div class="form-group row">
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
                                        </div> --}}
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
                                            <button type="submit" class="btn btn-primary btn-block">ĐỔI MẬT KHẨU</button>
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

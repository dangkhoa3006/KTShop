@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>KTMobile.vn - Profile</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets_admin/img/logo/icon_dashboard.png" />
    <link rel="stylesheet" href="../../assets_client/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets_client/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="../../assets_client/css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<style>
    /* Căn chỉnh các tab */
    .nav-tabs {
        border-bottom: 2px solid #ddd;
    }

    .nav-tabs>li {
        float: left;
        margin-bottom: -1px;
    }

    .nav-tabs>li>a {
        margin-right: 2px;
        line-height: 1.42857143;
        border: 1px solid transparent;
        border-radius: 4px 4px 0 0;
        padding: 10px 20px;
        color: #555;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:hover,
    .nav-tabs>li.active>a:focus {
        color: rgb(24, 131, 224);
        cursor: default;
        background-color: #fff;
        border: 1px solid rgb(24, 131, 224);
        border-bottom-color: rgb(24, 131, 224);
    }

    .nav-tabs>li>a:hover {
        border-color: #eee #eee #ddd;
    }

    .nav-tabs>li.disabled>a,
    .nav-tabs>li.disabled>a:hover,
    .nav-tabs>li.disabled>a:focus {
        color: #777;
        cursor: not-allowed;
        background-color: transparent;
        border: 1px solid transparent;
    }

    .nav-tabs .dropdown-menu {
        margin-top: -1px;
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }

    .tab-content>.tab-pane {
        display: none;
    }

    .tab-content>.active {
        display: block;
    }

    /* Thêm hiệu ứng chuyển đổi */
    .tab-content>.tab-pane {
        padding: 15px;
        animation: fadeEffect 0.5s;
    }

    /* Kiểu dáng cho tiêu đề */
    .tab-pane h3 {
        font-size: 24px;
        margin-top: 0;
    }

    .tab-pane p {
        font-size: 16px;
        color: #333;
    }

    .custom-radio .custom-control-label::before {
        border-radius: 50%;
    }

    .custom-radio .custom-control-input:checked~.custom-control-label::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
    }

    .custom-radio .custom-control-input:disabled:checked~.custom-control-label::before {
        background-color: rgba(78, 115, 223, 0.5);
    }
</style>

<body>
    <header class="header navbar-area">
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12" style="margin-left: 70%">
                        <div class="top-end">
                            <div class="user">
                                @auth
                                    @if (Auth::user()->avatar)
                                        {{-- dd({{Auth::user()->avatar}}) --}}
                                        <img style="width: 30px; border-radius: 20px;"
                                            src="../../storage/{{ Auth::user()->avatar }}" alt="">

                                        <img style="width: 30px; border-radius: 20px; margin-right: 5px"
                                            src="{{ Auth::user()->avatar }}" alt="">
                                    @else
                                        <i class="lni lni-user"></i>
                                    @endif
                                @else
                                    <i class="lni lni-user"></i>

                                @endauth

                                @auth
                                    @if (Auth::user()->name)
                                        {{ Auth::user()->name }}
                                    @else
                                        <!-- Nếu tên người dùng là NULL, hiển thị "Xin chào!" -->
                                        Xin chào!
                                    @endif
                                @else
                                    <!-- Nếu không đăng nhập, hiển thị "Xin chào!" -->
                                    Xin chào!
                                @endauth
                            </div>

                            @auth
                                <a href="{{ route('showProfile') }}" class="btn btn-outline-light mb-1"
                                    style="margin-right: 5px">
                                    <span class="text">Thông tin cá nhân</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger mb-1 logout-button">Đăng
                                        xuất</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary mb-1" style="margin-right: 5px">Đăng
                                    nhập</a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary mb-1">Đăng ký</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <a class="navbar-brand" href="{{ route('homepage') }}">
                            <h3>KTMobile Shop</h3>
                        </a>
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <div class="main-menu-search">
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1">
                                            <option selected>All</option>
                                            <option value="1">option 01</option>
                                            <option value="2">option 02</option>
                                            <option value="3">option 03</option>
                                            <option value="4">option 04</option>
                                            <option value="5">option 05</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="Search">
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-2">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span>(+84) 779 621 333</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="#">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items">2</span>
                                    </a>
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>2 Items</span>
                                            <a href="cart.html">View Cart</a>
                                        </div>
                                        <ul class="shopping-list">
                                            <li>
                                                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="product-details.html"><img
                                                            src="../../assets_client/images/header/cart-items/item1.jpg"
                                                            alt="#"></a>
                                                </div>

                                                <div class="content">
                                                    <h4><a href="product-details.html">
                                                            Apple Watch Series 6</a></h4>
                                                    <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="remove"
                                                    title="Remove this item"><i class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="product-details.html"><img
                                                            src="../../assets_client/images/header/cart-items/item2.jpg"
                                                            alt="#"></a>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="product-details.html">Wi-Fi Smart Camera</a></h4>
                                                    <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="bottom">
                                            <div class="total">
                                                <span>Total</span>
                                                <span class="total-amount">$134.00</span>
                                            </div>
                                            <div class="button">
                                                <a href="checkout.html" class="btn animate">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="nav-inner" style="display: flex;justify-content: flex-start;align-items: center;">
                    <li class="breadcrumb-item active" style="list-style-type: none;"><a
                            href="{{ route('homepage') }}"><i class="lni lni-home"></i> Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item " style="list-style-type: none;">Thông tin tài khoản</li>
                </div>
            </div>
            {{-- error: #FF6969 || success: #74E291 --}}
            {{-- Success --}}
            @if (session('success'))
                <div class="col-lg-6 col-md-6 col-12">
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                        style="background-color: #74E291; font-size: 17px; color: #059212">
                        <b>Thành công</b>
                        <br><span>{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
            {{-- Error --}}
            @if (session('error'))
                <div class="col-lg-6 col-md-6 col-12">
                    <div id="error-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                        style="background-color: #FF6969; font-size: 17px; color: #910909">
                        <b>Không thành công</b>
                        <br><span>{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>


    <div class="container-pages">
        <section class="item-details section">
            <div class="container">
                <div class="top-area">
                    {{-- Menu tab --}}
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-12 col-12">
                            <div class="product-images">
                                <main id="gallery">
                                    <form method="POST" action="{{ route('updateAvatar') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="main-img">
                                            @auth
                                                @if (Auth::user()->avatar)
                                                    {{-- dd({{Auth::user()->avatar}}) --}}
                                                    <img style="margin: 0px 20%; width: 70%; height: auto; object-fit: contain; border-radius: 30px"
                                                        src="{{ asset('storage/' . $user->avatar) }}" id="preview">
                                                @elseif ($user->avatar)
                                                    <img style="margin: 0px 20%; width: 70%; height: auto; object-fit: contain; border-radius: 30px"
                                                        src="{{ $user->avatar }}" id="preview">
                                                @else
                                                    <img style="margin: 0px 20%; width: 70%; height: auto; object-fit: contain; border-radius: 30px"
                                                        src="{{ asset('../image/user_default.png') }}" id="preview">
                                                @endif
                                            @endauth

                                            <input type="file" accept="image/*" name="avatar" id="avatar"
                                                class="upload-input" onchange="previewImage()"
                                                style="display: none;" />
                                        </div>
                                        <a class="btn btn-secondary"
                                            onclick="document.getElementById('avatar').click()"
                                            style="margin-left: 35%; margin-bottom: 5px">
                                            <i class="lni lni-pencil-alt"></i>
                                            <span class="text">Chọn ảnh</span>
                                        </a>

                                        <button type="submit" class="btn btn-outline-secondary"
                                            style="margin-left: 37%">
                                            <i class="lni lni-save"></i>
                                            <span class="text">Lưu ảnh</span>
                                        </button>
                                    </form>
                                </main>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-12 col-12" style="height: 600px">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Thông tin tài khoản</a></li>
                                <li><a data-toggle="tab" href="#menu1">Sản phẩm đã mua</a></li>
                                <li><a data-toggle="tab" href="#menu2">Hóa đơn đã hủy</a></li>
                                <li><a data-toggle="tab" href="#menu3">Tích điểm</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane active">
                                    <form id="profileForm" method="POST" action="{{ route('updateProfile') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div style="margin-top: 5px; color: #333;">
                                            <b for="name" class="col-sm-1 col-form-label">Họ tên</b>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="name"
                                                    name="name" value="{{ old('name', $user->name) }}"
                                                    placeholder="Họ tên...">
                                                <div style="color: red">
                                                    @if ($errors->has('name'))
                                                        {{ $errors->first('name') }}<br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <p style="margin-top: 10px"><b style="margin-right: 20px;">Email:
                                            </b>{{ $user->email }}</p>
                                        <fieldset class="form-group" style="margin-top: 5px">
                                            <div class="d-flex align-items-center" style="color: #333">
                                                <b style="margin-right: 10px; font-size: 15px;">Giới tính</b>
                                                <div class="custom-control custom-radio" style="margin-right: 10px;">
                                                    <input type="radio" id="customRadio1" name="gender"
                                                        value="male" class="custom-control-input"
                                                        {{ old('gender', $user->gender) == 'male' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customRadio1">Nam</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="gender"
                                                        value="female" class="custom-control-input"
                                                        {{ old('gender', $user->gender) == 'female' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customRadio2">Nữ</label>
                                                </div>
                                            </div>
                                            <div style="color: red; margin-left: 20px;">
                                                @if ($errors->has('gender'))
                                                    {{ $errors->first('gender') }}<br>
                                                @endif
                                            </div>
                                        </fieldset>
                                        <div style="margin-top: 5px; color: #333;">
                                            <b style="margin-right: 10px; font-size: 15px;">Số điện thoại</b>
                                            <div class="col-sm-8">
                                                <input type="tel" class="form-control" name="phone"
                                                    id="phone" value="{{ old('phone', $user->phone) }}">
                                                <div style="color: red;">
                                                    @if ($errors->has('phone'))
                                                        {{ $errors->first('phone') }}<br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 5px; color: #333">
                                            <b for="exampleFormControlSelect1"
                                                class="col-sm-2 col-form-label">Tỉnh/thành phố</b>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="province_id" id="selectProvinces">
                                                    <option value="">----Chọn tỉnh/thành phố----</option>
                                                    @if (!@empty($provinces))
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}"
                                                                {{ old('province_id', $user->province_id) == $province->id ? 'selected' : '' }}>
                                                                {{ $province->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div style="color: red;">
                                                    @if ($errors->has('province_id'))
                                                        {{ $errors->first('province_id') }}<br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 5px; color: #333">
                                            <b for="exampleFormControlSelect1"
                                                class="col-sm-2 col-form-label">Quận/huyện</b>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="district_id" id="selectDistricts">
                                                    <option value="">----Chọn quận/huyện----</option>
                                                    @if (!@empty($districts))
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}"
                                                                {{ old('district_id', $user->district_id) == $district->id ? 'selected' : '' }}>
                                                                {{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div style="color: red;">
                                                    @if ($errors->has('district_id'))
                                                        {{ $errors->first('district_id') }}<br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 5px; color: #333">
                                            <b for="exampleFormControlSelect1"
                                                class="col-sm-2 col-form-label">Phường/xã</b>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="ward_id" id="selectWards">
                                                    <option value="">----Chọn phường/xã----</option>
                                                    @if (!@empty($wards))
                                                        @foreach ($wards as $ward)
                                                            <option value="{{ $ward->id }}"
                                                                {{ old('ward_id', $user->ward_id) == $ward->id ? 'selected' : '' }}>
                                                                {{ $ward->name }}
                                                            </option>
                                                        @endforeach

                                                    @endif
                                                </select>
                                                <div style="color: red;">
                                                    @if ($errors->has('ward_id'))
                                                        {{ $errors->first('ward_id') }}<br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-top: 5px; color: #333">
                                            <b for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Địa
                                                chỉ</b>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"
                                                    placeholder="Địa chỉ...">{{ old('address', $user->address) }}</textarea>
                                            </div>
                                            <div style="color: red; margin-left: 18%;">
                                                @if ($errors->has('address'))
                                                    {{ $errors->first('address') }}<br>
                                                @endif
                                            </div>
                                        </div>
                                        <p style="margin-top: 5px;"><b>Chức vụ: </b>
                                            @if ($user->role == 2)
                                                Thành viên
                                            @elseif ($user->role == 1)
                                                Quản trị viên
                                            @elseif ($user->role == 0)
                                                Nhân viên
                                            @endif
                                        </p>
                                        <div class="form-group row">
                                            <div class="col-sm-10" style="margin-left: 45%">
                                                <button type="submit" class="btn btn-primary">Cập nhật tài
                                                    khoản</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="menu1" class="tab-pane">
                                    <h3>Menu 1</h3>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex
                                        ea commodo consequat.</p>
                                </div>
                                <div id="menu2" class="tab-pane">
                                    <h3>Menu 2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque
                                        laudantium, totam rem aperiam.</p>
                                </div>
                                <div id="menu3" class="tab-pane">
                                    <h3>Menu 3</h3>
                                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                                        dicta
                                        sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <footer class="footer">
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer f-contact">
                                <h3>TỔNG ĐÀI HỖ TRỢ</h3>
                                <p class="phone">Điện thoại: 088.99999.33</p>
                                <ul>
                                    <li><span>Thời gian làm việc </span>Thứ 2 - Thứ 7: 08h30 - 21h00</li>
                                    <li><span>Thời gian làm việc</span> Chủ Nhật: 08h30 - 12h00</li>
                                </ul>
                                <p class="mail">
                                    <a href="mailto:support@shopgrids.com">supports@ktmobile.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer f-link">
                                <h3>HỖ TRỢ KHÁCH HÀNG</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Mua hàng trả góp</a></li>
                                    <li><a href="javascript:void(0)">Chính sách kiểm hàng</a></li>
                                    <li><a href="javascript:void(0)">Mua hàng online</a></li>
                                    <li><a href="javascript:void(0)">Chính sách kiểm hàng</a></li>
                                    <li><a href="javascript:void(0)">Chính sách đổi trả</a></li>
                                    <li><a href="javascript:void(0)">Dịch vụ bảo hành</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer f-link">
                                <h3>KTMOBILE</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Giới thiệu về KTMobile</a></li>
                                    <li><a href="javascript:void(0)">Liên hệ hợp tác</a></li>
                                    <li><a href="javascript:void(0)">Hệ thống cửa hàng</a></li>
                                    <li><a href="javascript:void(0)">Về trang chủ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer f-link">
                                <h3>KINH DOANH SẢN PHẨM</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Máy tính bảng</a></li>
                                    <li><a href="javascript:void(0)">Điện thoại thông minh</a></li>
                                    <li><a href="javascript:void(0)">Phụ kiện, tai nghe</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <p style="text-align: center">
                            Copyright © 2024 KTMobile. Giấy chứng nhận ĐKKD số 41J8021261 do UBND Quận 1 cấp ngày
                            04/05/2024. Bản quyền ktmobile.vn Địa chỉ: 65 đường Huỳnh Thúc Kháng, Phường Bến Nghé, Quận
                            1, TP. Hồ Chí Minh, Việt Nam.
                            Điện thoại liên hệ: 0779621333. Email: lecongthinh24062002@gmail.com.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <script src="../../assets_client/js/bootstrap.min.js"></script>
    <script src="../../assets_client/js/tiny-slider.js"></script>
    <script src="../../assets_client/js/glightbox.min.js"></script>
    <script src="../../assets_client/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        function previewImage() {
            const preview = document.getElementById('preview');
            const fileInput = document.getElementById('avatar');
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                document.getElementById("preview").src = "{{ $user->avatar ? asset('storage/' . $user->avatar) : '' }}";
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            //select districts from provinces
            $("#selectProvinces").change(function() {
                var province_id = $(this).val();
                if (province_id == "") {
                    var province_id = 0;
                }
                $.ajax({
                    url: '{{ url('fetch-districts/') }}/' + province_id,
                    type: 'post',
                    dataType: "json",
                    success: function(response) {
                        //console.log(response['districts'].length);

                        //console.log(response['districts'].length);
                        $('#selectDistricts').find('option:not(:first)').remove();
                        $('#selectWards').find('option:not(:first)').remove();

                        if (response['districts'].length > 0) {
                            $.each(response['districts'], function(key, value) {
                                $("#selectDistricts").append("<option value='" + value[
                                    'id'] + "'>" + value['name'] + "</option>");
                            });
                        }
                    }
                });
            });

            $("#selectDistricts").change(function() {
                var district_id = $(this).val();
                if (district_id == "") {
                    var district_id = 0;
                }
                $.ajax({
                    url: '{{ url('fetch-wards/') }}/' + district_id,
                    type: 'post',
                    dataType: "json",
                    success: function(response) {
                        $('#selectWards').find('option:not(:first)').remove();
                        if (response['wards'].length > 0) {
                            $.each(response['wards'], function(key, value) {
                                $("#selectWards").append("<option value='" + value[
                                    'id'] + "'>" + value['name'] + "</option>");
                            });
                        }
                    }
                });
            });
            //set thời gian thông báo
            setTimeout(function() {
                $("#success-alert").alert('close'); // Đóng alert sau 2 giây
            }, 2000);
            setTimeout(function() {
                $("#error-alert").alert('close'); // Đóng alert sau 2 giây
            }, 2000);
        });
    </script>
</body>

</html>

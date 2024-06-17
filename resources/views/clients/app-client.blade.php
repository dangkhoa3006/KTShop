<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets_admin/img/logo/icon_dashboard.png" />
    <link rel="stylesheet" href="../../assets_client/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets_client/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="../../assets_client/css/tiny-slider.css" />
    <link rel="stylesheet" href="../../assets_client/css/glightbox.min.css" />
    <link rel="stylesheet" href="../../assets_client/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"
        integrity="sha512-C8Movfk6DU/H5PzarG0+Dv9MA9IZzvmQpO/3cIlGIflmtY3vIud07myMu4M/NTPJl8jmZtt/4mC9bAioMZBBdA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <!-- Preloader load trang -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Đăng nhập & đăng ký -->
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
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="{{ route('homepage') }}">
                            {{-- <img src="../../assets_client/images/logo/logo.svg" alt="Logo"> --}}
                            <h3>KTMobile Shop</h3>
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">

                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
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
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
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
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items">2</span>
                                    </a>
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>2 Items</span>
                                            <a href="cart.html">View Cart</a>
                                        </div>
                                        <ul class="shopping-list">
                                            <li>
                                                <a href="javascript:void(0)" class="remove"
                                                    title="Remove this item"><i class="lni lni-close"></i></a>
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

                                    <!--/ End Shopping Item -->
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- DAN MỤC SẢN PHẨM -->
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="lni lni-menu"></i>Danh mục sản phẩm</span>
                            <ul class="sub-category">
                                @foreach ($list as $cate)
                                    {{-- Dựa vào quan hệ 2 bảng để lấy ra loại sản phẩm theo danh mục --}}
                                    @if ($cate->subCategories->where('status', 1)->isNotEmpty())
                                        <li><a href="{{ route('showCategory', $cate->slug) }}">{{ $cate->name }}<i
                                                    class="lni lni-chevron-right"></i></a>
                                            <ul class="inner-sub-category">
                                                @foreach ($cate->subCategories->where('status', 1) as $subcate)
                                                    <li>
                                                        <a
                                                            href="{{ route('showSubCategory', [$cate->slug, $subcate->slug]) }}">{{ $subcate->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li><a
                                                href="{{ route('showCategory', $cate->slug) }}">{{ $cate->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <span style="margin-right: 20px"><b>Sản phẩm hot: </b></span>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="index.html" class="active" aria-label="Toggle navigation">Iphone 15
                                            Pro Max</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.html" aria-label="Toggle navigation">Iphone 15 Plus</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.html" aria-label="Toggle navigation">Galaxy S24 Ultra</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.html" aria-label="Toggle navigation">Galaxy S23 Ultra</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.html" aria-label="Toggle navigation">Xiaomi giá rẻ</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->

                    </div>

                </div>

            </div>

        </div>

    </header>
    <br>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-12">
                <div class="nav-inner" style="display: flex;justify-content: flex-start;align-items: center;">
                    @section('header-route')
                    @show
                </div>
            </div>
        </div>
    </div>

    <div class="container-pages">
        @yield('client-content-pages')
    </div>


    <!-- Start Banner Area -->
    {{-- <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner"
                        style="background-image:url('../../assets_client/images/banner/banner-1-bg.jpg')">
                        <div class="content">
                            <h2>Smart Watch 2.0</h2>
                            <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin"
                        style="background-image:url('../../assets_client/images/banner/banner-2-bg.jpg')">
                        <div class="content">
                            <h2>Smart Headphone</h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Banner Area -->
    <!-- Start Footer Area -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 0) { // Kiểm tra nếu đã cuộn
                    $('.header-middle').addClass('sticky'); // Thêm lớp 'sticky'
                } else {
                    $('.header-middle').removeClass('sticky'); // Xóa lớp 'sticky'
                }
            });
            //slider
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 50,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        });
    </script>
</body>

</html>

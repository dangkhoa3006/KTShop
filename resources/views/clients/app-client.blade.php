<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="../../../../assets_admin/img/logo/icon_dashboard.png" />
    <link rel="stylesheet" href="../../../assets_client/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets_client/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="../../../assets_client/css/tiny-slider.css" />
    <link rel="stylesheet" href="../../../assets_client/css/glightbox.min.css" />
    <link rel="stylesheet" href="../../../assets_client/css/main.css" />
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
                                            src="../../../storage/{{ Auth::user()->avatar }}" alt="">

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
                        <form action="" method="GET" id="search-form">
                            <div class="col-lg-5 col-md-7 d-xs-none" style="width: 100%;">
                                {{-- Tìm kiếm sản phẩm --}}
                                <div class="main-menu-search">
                                    <div class="navbar-search search-style-5">
                                        <div class="search-input">
                                            <input type="text" id="search-input" name="query"
                                                placeholder="Bạn muốn tìm gì ?" oninput="updateFormAction()">
                                        </div>
                                        <div class="search-btn">
                                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                <a href="{{ route('formCheckOrder') }}" class="btn btn-outline-secondary mb-1"
                                    style="margin-right: 10px;">Tra cứu đơn hàng</a>
                                {{-- Shopping cart --}}
                                <div class="cart-items">
                                    <a href="{{ route('indexCart') }}" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items-cart">{{ session('cartItemsCount', 0) }}</span>
                                    </a>
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
                        <div class="mega-category-menu" style="margin-top: 10px; margin-bottom: 15px" >
                            <span class="cat-button"><i class="lni lni-menu" ></i> Danh mục sản phẩm</span>
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
                    </div>
                </div>
            </div>
        </div>
    </header>
    <br>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-6 col-12">
                <div class="nav-inner" style="display: flex;justify-content: flex-start;align-items: center;">
                    @section('header-route')
                    @show
                </div>
            </div>
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
            @if (session('payment-success'))
                <div class="col-lg-6 col-md-6 col-12"></div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                        style="background-color: #74E291; font-size: 17px; color: #059212">
                        <b>Thành công</b>
                        <br><span>{{ session('payment-success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('payment-check'))
                <div class="col-lg-6 col-md-6 col-12"></div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert"
                        style="background-color: #fff9a3; font-size: 17px; color: #d27605">
                        <b>Đặt hàng thành công</b>
                        <br><span>{{ session('payment-check') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif

            {{-- Error --}}
            @if (session('error'))
                <div class="col-lg-6 col-md-6 col-12">
                    <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert"
                        style="background-color: #FF6969; font-size: 17px; color: #910909">
                        <b>Không thành công</b>
                        <br><span>{{ session('error') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if (session('alert-error'))
                <div class="col-lg-6 col-md-6 col-12"></div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert"
                        style="background-color: #FF6969; font-size: 17px; color: #910909">
                        <b>Không thành công</b>
                        <br><span>{{ session('alert-error') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="container-pages">
        @yield('client-content-pages')
    </div>
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

    <script src="../../../assets_client/js/bootstrap.min.js"></script>
    <script src="../../../assets_client/js/tiny-slider.js"></script>
    <script src="../../../assets_client/js/glightbox.min.js"></script>
    <script src="../../../assets_client/js/main.js"></script>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
            });
            //set thời gian thông báo
            setTimeout(function() {
                $("#success-alert").alert('close'); // Đóng alert sau 3 giây
            }, 3000);
            setTimeout(function() {
                $("#error-alert").alert('close'); // Đóng alert sau 3 giây
            }, 3000);

            //Thêm sản phẩm vào giỏ hàng
            $('.add-to-cart-form').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn hành vi submit mặc định

                var form = $(this);
                var url = form.attr('action');
                var formData = form.serialize(); // Lấy tất cả dữ liệu từ form

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            // Xóa các thông báo cũ
                            $('.notification').remove();

                            // Hiển thị thông báo thành công
                            var successAlert = `
                    <div id="success-alert" class="notification alert alert-success alert-dismissible fade show" role="alert"
                        style="position: fixed; top: 20px; right: 20px; z-index: 9999; background-color: #74E291; 
                        font-size: 17px; color: #059212">
                        <b>Thành công</b>
                        <br><span>${response.success}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
                            $('body').append(successAlert); // Thêm thông báo vào body của trang

                            // Cập nhật số lượng sản phẩm trong giỏ hàng
                            $('.total-items-cart').text(response.cartItemsCount);

                            // Cập nhật số lượng sản phẩm thanh toán
                            $('.total-items-order').text('Tổng cộng ' + response
                                .cartItemsCount + ' sản phẩm');

                            // Đóng thông báo sau 3 giây
                            setTimeout(function() {
                                $("#success-alert").alert('close');
                            }, 3000); // 3000 milliseconds = 3 giây
                        }
                    },
                    error: function(xhr) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.error) {
                            // Xóa các thông báo cũ nếu có
                            $('.notification').remove();

                            // Hiển thị thông báo lỗi
                            var errorAlert = `
                <div id="error-alert" class="notification alert alert-danger alert-dismissible fade show" role="alert"
                    style="position: fixed; top: 20px; right: 20px; z-index: 9999; background-color: #F8D7DA; 
                    font-size: 17px; color: #842029">
                    <b>Không thành công</b>
                    <br><span>${response.error}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
                            $('body').append(errorAlert); // Thêm thông báo vào body của trang

                            // Đóng thông báo sau 3 giây
                            setTimeout(function() {
                                $("#error-alert").alert('close');
                            }, 3000); // 3000 milliseconds = 3 giây
                        }
                    }
                });
            });
            //Nút mua ngay sản phẩm
            $('#buy-now-btn').on('click', function(e) {
                e.preventDefault(); // Ngăn chặn hành vi mặc định

                var form = $('.add-to-cart-form');
                var url = form.attr('action');
                var formData = form.serialize(); // Lấy tất cả dữ liệu từ form

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            window.location.href =
                                '{{ route('indexCart') }}'; // Chuyển hướng đến trang indexCart
                        } else {
                            // Hiển thị thông báo lỗi nếu cần
                            alert('Có lỗi xảy ra. Vui lòng thử lại.');
                        }
                    },
                    error: function(xhr) {
                        // Hiển thị thông báo lỗi nếu cần
                        alert('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                });
            });
        });

        //Sắp xếp sản phẩm tăng dần và giảm dần thep giá tiền
        function sortProducts(order) {
            let url = new URL(window.location.href);
            url.searchParams.set('sort', order);
            window.location.href = url.toString();
        }
        //Tìm kiếm sản phẩm
        function updateFormAction() {
            const input = document.getElementById('search-input');
            const form = document.getElementById('search-form');
            form.action = "{{ url('/san-pham/search/keyword') }}/" + encodeURIComponent(input.value);
        }

    </script>
</body>

</html>

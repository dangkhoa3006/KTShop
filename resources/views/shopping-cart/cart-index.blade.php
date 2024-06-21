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
    <link href="../../../assets_admin/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<style>
    .quantity-input {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 120px;
        /* Độ rộng của input */
    }

    .quantity-input input[type="number"] {
        width: 60px;
        /* Độ rộng của input number */
        text-align: center;
        /* Canh giữa nội dung của input */
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .quantity-input span {
        cursor: pointer;
        padding: 5px 10px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .quantity-input span:hover {
        background-color: #e0e0e0;
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
                                        Xin chào!
                                    @endif
                                @else
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
                                        <span class="total-items-wishlist">0</span>
                                    </a>
                                </div>
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
    </header>
    <br>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="nav-inner" style="display: flex;justify-content: flex-start;align-items: center;">
                    <li class="breadcrumb-item active" style="list-style-type: none;"><a
                            href="{{ route('homepage') }}"><i class="lni lni-home"></i> Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item " style="list-style-type: none;">Chi tiết giỏ hàng</li>
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

    <div class="container">
        <div class="row align-items-center" style="display: flex;flex-direction: column;min-height: 60vh;">
            <!-- DataTable with Hover -->
            <div class="col-lg-20 col-12 custom-padding-right">
                <div class="card mb-4" style="margin-left: 9%; margin-right: 9%; margin-top: 20px">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng cộng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cart-items">
                                @foreach (Cart::content() as $item)
                                    <tr data-rowid="{{ $item->rowId }}">
                                        <td><img src="{{ $item->options->image }}"
                                                style="width: 50px; height: 50px; object-fit: contain;"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div class="quantity-input">
                                                <span class="minus">-</span>
                                                <input type="number" name="quantity" value="{{ $item->qty }}"
                                                    min="1" class="quantity" max="5"
                                                    style="width: 60px; text-align:center;" readonly>
                                                <span class="plus">+</span>
                                            </div>
                                        </td>
                                        <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                                        <td class="subtotal">{{ number_format($item->subtotal, 0, ',', '.') }} đ</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm remove-from-cart"
                                                data-rowid="{{ $item->rowId }}">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td id="total" class="text-danger"><strong>{{ Cart::subtotal(0, ',', '.') }}
                                            đ</strong></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                </div>
            </div>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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

            // Cập nhật số lượng sản phẩm trong giỏ hàng bằng AJAX
            $(document).on('change', '.quantity', function() {
                var rowId = $(this).closest('tr').data('rowid');
                var quantity = $(this).val();

                $.ajax({
                    url: '{{ route('cart.update', ':rowId') }}'.replace(':rowId', rowId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        quantity: quantity
                    },
                    success: function(response) {
                        $('#cart-message').html('<div class="alert alert-success">' + response
                            .success + '</div>');
                        updateCartItem(rowId, response.updatedItem);
                        updateCartTotal(response.total);
                    },
                    error: function(xhr) {
                        $('#cart-message').html(
                            '<div class="alert alert-danger">Error updating product quantity.</div>'
                        );
                    }
                });
            });

            $('.quantity-input .minus').click(function() {
                var $input = $(this).parent().find('input[type="number"]');
                var value = parseInt($input.val());
                var min = parseInt($input.attr('min')) || 1;

                if (value > min) {
                    $input.val(value - 1);
                    updateQuantity($input);
                    $('.total-items-cart').text(response.cartItemsCount);
                }
            });

            $('.quantity-input .plus').click(function() {
                var $input = $(this).parent().find('input[type="number"]');
                var value = parseInt($input.val());
                var max = parseInt($input.attr('max')) || Infinity;

                if (value < max) {
                    $input.val(value + 1);
                    updateQuantity($input);
                    $('.total-items-cart').text(response.cartItemsCount);
                }
            });

            function updateQuantity($input) {
                var rowId = $input.closest('tr').data('rowid');
                var quantity = $input.val();

                $.ajax({
                    url: '{{ route('cart.update', ':rowId') }}'.replace(':rowId', rowId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        quantity: quantity
                    },
                    success: function(response) {
                        $('#cart-message').html('<div class="alert alert-success">' + response.success +
                            '</div>');
                        updateCartItem(rowId, response.updatedItem);
                        updateCartTotal(response.total);
                        $('.total-items-cart').text(response.cartItemsCount);
                    },
                    error: function(xhr) {
                        $('#cart-message').html(
                            '<div class="alert alert-danger">Error updating product quantity.</div>'
                            );
                    }
                });
            }


            // Xóa sản phẩm khỏi giỏ hàng bằng AJAX
            $(document).on('click', '.remove-from-cart', function() {
                var rowId = $(this).data('rowid');

                $.ajax({
                    url: '{{ route('cart.remove', ':rowId') }}'.replace(':rowId', rowId),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#cart-message').html('<div class="alert alert-success">' + response
                            .success + '</div>');
                        removeCartItem(rowId);
                        updateCartTotal(response.total);
                        $('.total-items-cart').text(response.cartItemsCount);
                    },
                    error: function(xhr) {
                        $('#cart-message').html(
                            '<div class="alert alert-danger">Error removing product from cart.</div>'
                        );
                    }
                });
            });

            // Cập nhật thông tin sản phẩm trong giỏ hàng
            function updateCartItem(rowId, updatedItem) {
                var $tr = $('tr[data-rowid="' + rowId + '"]');

                // Kiểm tra và chuyển đổi thành số
                var qty = parseFloat(updatedItem.qty);
                var price = parseFloat(updatedItem.price);

                if (!isNaN(qty) && !isNaN(price)) {
                    // Cập nhật số lượng sản phẩm
                    $tr.find('.quantity').val(qty);

                    // Tính toán lại subtotal
                    var subtotal = qty * price;

                    // Định dạng số tiền VND với Intl.NumberFormat
                    var formattedSubtotal = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(subtotal);

                    $tr.find('.subtotal').text(formattedSubtotal);

                    // Gọi lại hàm cập nhật tổng giá trị giỏ hàng
                    updateCartTotal();
                } else {
                    console.error('Dữ liệu số lượng hoặc giá không hợp lệ.');
                    // Xử lý lỗi nếu cần thiết
                }
            }

            // Hàm cập nhật tổng giá trị giỏ hàng
            function updateCartTotal() {
                var total = 0;
                // Lặp qua từng sản phẩm trong giỏ hàng để tính tổng
                $('tr').each(function() {
                    var subtotalStr = $(this).find('.subtotal').text();
                    // Lấy giá trị số từ chuỗi định dạng tiền tệ VND
                    var subtotal = parseFloat(subtotalStr.replace(/\D/g,
                        '')); // Xóa hết ký tự không phải số

                    if (!isNaN(subtotal)) {
                        total += subtotal;
                    }
                });

                // Định dạng lại số tiền VND cho total
                var formattedTotal = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(total);

                // Cập nhật nội dung của phần tổng giá trị giỏ hàng
                $('#total').html('<strong>' + formattedTotal + '</strong>');
            }

            // Xóa sản phẩm khỏi giỏ hàng
            function removeCartItem(rowId) {
                $('tr[data-rowid="' + rowId + '"]').remove();
            }
        });
    </script>
</body>

</html>

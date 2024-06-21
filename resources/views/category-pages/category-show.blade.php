@extends('clients.app-client')
@section('title', 'KTMobile.vn - ' . $category->name)
@section('header-route')
    @parent <li class="breadcrumb-item active" style="list-style-type: none;"><a href="{{ route('homepage') }}"><i
                class="lni lni-home"></i> Trang chủ</a>
    </li>
    <li class="breadcrumb-item " style="list-style-type: none;">{{ $category->name }}</li>
@endsection
@section('client-content-pages')
    <!-- Content pages -->
    {{-- Slider khuyến mãi và quảng cáo --}}
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-20 col-12 custom-padding-right">
                    <div class="slider-head">
                        <div class="hero-slider">
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/hero/banner_7.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/hero/banner_2.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/hero/banner_3.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/hero/banner_4.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/hero/banner_5.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/hero/banner_10.png);">
                            </div>
                        </div>
                    </div>
                    <br>
                    <h5 style="font-weight: bold">Danh mục {{ $category->name }}</h5>
                    <br>
                    @foreach ($subCategories as $subcate)
                        <a href="{{ route('showSubCategory', [$category->slug, $subcate->slug]) }}"
                            class="btn btn-outline-secondary mb-1">{{ $subcate->name }}</a>
                    @endforeach
                    <br>
                </div>
            </div><br>
            <h5>Lọc sản phẩm theo giá: từ cao đến thấp, từ thấp đến cao, khuyến mãi</h5>
        </div>
    </section>

    <!-- Start Trending Product Area -->
    <section class="trending-product section" style="top: 0">
        <div class="container">
            <div class="row">
                {{-- Thẻ sản phẩm --}}
                <!-- Start Single Product -->
                @foreach ($listProduct as $p)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product" style="width: 290px; height: auto;">
                            <div class="product-image">
                                <span class="new-tag">Mới</span>
                                <a href="{{ route('showProduct', $p->slug) }}">
                                    <img style="margin: 35px 30px; width: 220px; max-height: 220px; object-fit: contain;"
                                        src="{{ $p->image }}" alt="#">
                                </a>
                                <div class="button">
                                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                        <input type="hidden" name="name" value="{{ $p->name }}">
                                        <input type="hidden" name="price" value="{{ $p->sale_price }}">
                                        <input type="hidden" name="qty" value="1">
                                        <!-- Mặc định là 1, bạn có thể tùy chỉnh -->
                                        <input type="hidden" name="image" value="{{ $p->image }}">
                                        <button type="submit" class="btn"><i class="lni lni-cart"></i> Thêm</button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="title">
                                    <a href="{{ route('showProduct', $p->slug) }}">{{ $p->name }}</a>
                                </h4>
                                <div class="price">
                                    <span>{{ number_format($p->sale_price, 0, ',', '.') }} đ</span>
                                    @if ($p->price && $p->price != 0)
                                        <span class="discount-price">{{ number_format($p->price, 0, ',', '.') }} đ</span>
                                    @endif
                                </div>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Kết thúc thẻ sản phẩm --}}
                <!-- End Single Product -->
                {{-- Thẻ sản phẩm --}}
                <!-- Start Single Product -->
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-4.jpg" alt="#">
                            <span class="sale-tag">Giảm 10%</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Thêm </a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h4 class="title">
                                <a href="product-grids.html">iPhone 15 Plus 256GB (VN/A)</a>
                            </h4>
                            <div class="price">
                                <span>24.399.000đ</span>
                                <span class="discount-price">27.699.000đ</span>
                            </div>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Kết thúc thẻ sản phẩm --}}
                <!-- End Single Product -->
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-4.jpg" alt="#">
                            <span class="new-tag">New</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Phones</span>
                            <h4 class="title">
                                <a href="product-grids.html">Samsung Galaxy S24 Plus 5G (12GB|256GB) (CTY)</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$400.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-4.jpg" alt="#">
                            <span class="new-tag">New</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Phones</span>
                            <h4 class="title">
                                <a href="product-grids.html">iphone 6x plus</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$400.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        {{-- <div class="product-image">
                            <img src="../../assets_client/images/products/product-4.jpg" alt="#">
                            <span class="new-tag">New</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div> --}}
                        <div class="product-info">
                            {{-- <span class="category">Phones</span>
                            <h4 class="title">
                                <a href="product-grids.html">iphone 6x plus</a>
                            </h4> --}}
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            {{-- <div class="price">
                                <span>$400.00</span>
                            </div> --}}
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-4.jpg" alt="#">
                            <span class="new-tag">New</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Phones</span>
                            <h4 class="title">
                                <a href="product-grids.html">iphone 6x plus</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$400.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-4.jpg" alt="#">
                            <span class="new-tag">New</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Phones</span>
                            <h4 class="title">
                                <a href="product-grids.html">iphone 6x plus</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$400.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-4.jpg" alt="#">
                            <span class="new-tag">New</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Phones</span>
                            <h4 class="title">
                                <a href="product-grids.html">iphone 6x plus</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$400.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary">Xem thêm 100 sản phẩm
                        <i class="lni lni-chevron-down"></i>
                    </button>
                </div><br>
                {{-- Bình luận sản phẩm --}}
                <div class="col-lg-20 col-12 custom-padding-right">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <h5 style="font-weight: bold">Hỏi và đáp</h5><br>
                        <div class="col-sm-20">
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="5"
                                placeholder="Mời bạn thảo luận, vui lòng nhập tiếng việt có dấu"></textarea>
                        </div>
                        <h6 style="margin-top: 20px;margin-bottom: 5px;">Nhập thông tin của bạn</h6>
                        <div class="col-sm-20">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" placeholder="Họ tên...">
                        </div>
                        <div class="col-sm-20" style="margin-top: 10px">
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Email...">
                        </div>
                        <div class="text-right mt-4 b" style="text-align: right; ">
                            <button class="btn btn-warning"> <i class="lni lni-telegram-plane"></i> Gửi bình luận
                            </button>
                        </div><br>
                    </div>
                </div>
                {{-- Hiển thị danh sách người bình luận --}}
                <div class="col-lg-20 col-12 custom-padding-right">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="user" style="font-size: 15px; font-weight: bold">
                            <div style="display: flex; align-items: center;">
                                <img class="img-profile rounded-circle" src="../../../assets_admin/img/boy.png"
                                    style="max-width: 40px;border: 1px solid black;">
                                <h6 style="margin:10px">Nguyen Van A</h6>
                            </div>
                            <p style="margin-top: 10px">KTmobile chi nhánh ở quận 10 có sẵn ip15 pm 256gb màu Titan trắng k
                                ạ</p>
                        </div>
                        Ngày gửi: 04/06/2024
                        <div class="user"
                            style="font-size: 15px; font-weight: bold; margin-top: 10px;margin-left: 60px; background-color:rgb(224, 224, 224); border-radius: 10px;">
                            <div style="display: flex; align-items: center;">
                                <img class="img-profile rounded-circle" src="../../../assets_admin/img/boy.png"
                                    style="max-width: 40px;border: 1px solid black; margin-left: 10px;margin-top: 10px;">
                                <h6 style="margin-top:10px;margin-left:10px;">Quản trị viên</h6>

                            </div>
                            <p style="margin-top: 10px; margin-left: 10px">Còn hàng bạn nha</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Giao hàng toàn quốc</h5>
                        <span>Miễn phí nội thành TP.HCM</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>Dùng thử 7 ngày miễn phí.</h5>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-protection"></i>
                    </div>
                    <div class="media-body">
                        <h5>Máy mới bảo hành 12 - 18 tháng</h5>
                        <span>Máy cũ bảo hành 6 tháng</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-dropbox-original"></i>
                    </div>
                    <div class="media-body">
                        <h5>Hỗ trợ CSKH trực tuyến </h5>
                        <span>Giờ làm việc 8h00 đến 21h30</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->
    {{-- <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
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
                        if(response.success) {
                            alert(response.success); // Hiển thị thông báo thành công
                            $('.total-items-cart').text(response.totalItems); // Cập nhật số lượng sản phẩm trong giỏ hàng
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Xử lý lỗi
                    }
                });
            });
        });
    </script> --}}
@endsection

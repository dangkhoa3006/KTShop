@extends('clients.app-client')
@section('title', 'KTMobile.vn - Trang chủ')
@section('client-content-pages')
    <!-- Content pages -->
    {{-- Slider khuyến mãi và quảng cáo --}}
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-15 col-12 custom-padding-right">
                    <div class="slider-head">
                        <div class="hero-slider">
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_15.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_9.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_10.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_14.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_11.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_12.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_13.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_1.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_2.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_3.png);">
                            </div>
                            <div class="single-slider"
                                style="background-image: url(../../assets_client/images/slider/slider_4.png);">
                            </div>
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <!-- small banner -->

                {{-- <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url('../../assets_client/images/hero/slider-bnr.jpg');">
                                <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>$259.99</h3>
                                </div>
                            </div>

                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Chốt sale!</h2>
                                    <p>Ưu đãi 50% cho tất cả sản phẩm.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>

                    </div>
                </div> --}}
            </div>
        </div>
    </section>



    <!-- Start Trending Product Area -->
    <section class="trending-product section" style="margin-top: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>IPhone nổi bật</h2>
                    </div>
                </div>
                @foreach ($listIphone as $p)
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
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Samsung nổi bật</h2>
                    </div>
                </div>
                @foreach ($listSamsung as $p)
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
            </div><br><br>
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Phụ kiện nổi bật</h2>
                        <p>Hiển thị ra danh mục phụ kiện nổi bật.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-5.jpg" alt="#">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Headphones</span>
                            <h4 class="title">
                                <a href="product-grids.html">Wireless Headphones</a>
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
                                <span>$350.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-5.jpg" alt="#">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Headphones</span>
                            <h4 class="title">
                                <a href="product-grids.html">Wireless Headphones</a>
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
                                <span>$350.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-5.jpg" alt="#">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Headphones</span>
                            <h4 class="title">
                                <a href="product-grids.html">Wireless Headphones</a>
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
                                <span>$350.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-5.jpg" alt="#">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Headphones</span>
                            <h4 class="title">
                                <a href="product-grids.html">Wireless Headphones</a>
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
                                <span>$350.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
            </div>
            <div class="row">
                {{-- Widget sản phẩm khi load lên giao diện --}}
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        {{-- Nút thêm sản phẩm vào giỏ hàng --}}
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-1.jpg" alt="#">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            {{-- tên loại sản phẩm --}}
                            <span class="category">Watches</span>
                            {{-- tên sản phẩm --}}
                            <h4 class="title">
                                <a href="product-grids.html">Xiaomi Mi Band 5</a>
                            </h4>
                            {{-- Đánh giá sao sp --}}
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            {{-- Giá sản phẩm --}}
                            <div class="price">
                                <span>$199.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-2.jpg" alt="#">
                            <span class="sale-tag">-25%</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Speaker</span>
                            <h4 class="title">
                                <a href="product-grids.html">Big Power Sound Speaker</a>
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
                                <span>$275.00</span>
                                <span class="discount-price">$300.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-3.jpg" alt="#">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Camera</span>
                            <h4 class="title">
                                <a href="product-grids.html">WiFi Security Camera</a>
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
                                <span>$399.00</span>
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
                            <img src="../../assets_client/images/products/product-5.jpg" alt="#">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Headphones</span>
                            <h4 class="title">
                                <a href="product-grids.html">Wireless Headphones</a>
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
                                <span>$350.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-6.jpg" alt="#">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Speaker</span>
                            <h4 class="title">
                                <a href="product-grids.html">Mini Bluetooth Speaker</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$70.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-7.jpg" alt="#">
                            <span class="sale-tag">-50%</span>
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Headphones</span>
                            <h4 class="title">
                                <a href="product-grids.html">PX7 Wireless Headphones</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$100.00</span>
                                <span class="discount-price">$200.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="../../assets_client/images/products/product-8.jpg" alt="#">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">Laptop</span>
                            <h4 class="title">
                                <a href="product-grids.html">Apple MacBook Air</a>
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
                                <span>$899.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->
    {{-- Tiêu đề --}}
    <!-- Start Call Action Area -->
    {{-- <div class="col-12">
        <div class="section-title">
            <h2>KHÁCH HÀNG VÀ SỰ KIỆN</h2>
        </div>
    </div> --}}

    {{-- <section class="call-action section">
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img style="width: 300px; height: auto;"
                            src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
                            alt="">
                    </div>
                    <div class="item">
                        <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
                            alt="">
                    </div>
                    <div class="item">
                        <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
                            alt="">
                    </div>
                    <div class="item">
                        <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
                            alt="">
                    </div>
                    <div class="item">
                        <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
                            alt="">
                    </div>
                    <div class="item">
                        <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
                            alt="">
                    </div>
                    <div class="item">
                        <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
                            alt="">
                    </div>
                    <div class="item">
                        <img src="https://images.unsplash.com/photo-1575936123452-b67c3203c357?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D"
                            alt="">
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

    <!-- End Call Action Area -->
    {{-- Tin tức và bài viết --}}
    {{-- <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <section>
                        <div class="row gx-lg-5">
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4"
                                    data-mdb-ripple-color="light">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/113.webp" class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <a href="" class="text-info">
                                            <i class="fas fa-plane"></i>
                                            Travels
                                        </a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <u> 15.07.2020</u>
                                    </div>
                                </div>
                                <a href="" class="text-dark">
                                    <h5>This is title of the news</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, iste aliquid. Sed
                                        id nihil magni, sint vero provident esse numquam perferendis ducimus dicta
                                        adipisci iusto nam temporibus modi animi laboriosam?
                                    </p>
                                </a>
                                <hr />
                            </div>
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4"
                                    data-mdb-ripple-color="light">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/113.webp" class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <a href="" class="text-info">
                                            <i class="fas fa-plane"></i>
                                            Travels
                                        </a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <u> 15.07.2020</u>
                                    </div>
                                </div>
                                <a href="" class="text-dark">
                                    <h5>This is title of the news</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, iste aliquid. Sed
                                        id nihil magni, sint vero provident esse numquam perferendis ducimus dicta
                                        adipisci iusto nam temporibus modi animi laboriosam?
                                    </p>
                                </a>
                                <hr />
                            </div>
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <div class="bg-image hover-overlay shadow-1-strong ripple rounded-5 mb-4"
                                    data-mdb-ripple-color="light">
                                    <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/113.webp" class="img-fluid" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);">
                                        </div>
                                    </a>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <a href="" class="text-info">
                                            <i class="fas fa-plane"></i>
                                            Travels
                                        </a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <u> 15.07.2020</u>
                                    </div>
                                </div>
                                <a href="" class="text-dark">
                                    <h5>This is title of the news</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, iste aliquid. Sed
                                        id nihil magni, sint vero provident esse numquam perferendis ducimus dicta
                                        adipisci iusto nam temporibus modi animi laboriosam?
                                    </p>
                                </a>
                                <hr />
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4 col-12">
                    <h5>TIN TUC</h5>
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="hero-small-banner style2" style="height: 150px">
                                <div class="content">
                                    <h2>Tin 1!</h2>
                                    <p>Noi dung tin 1.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Xem ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="hero-small-banner style2" style="height: 150px">
                                <div class="content">
                                    <h2>Tin 2!</h2>
                                    <p>Noi dung tin 2.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Xem ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="hero-small-banner style2" style="height: 150px">
                                <div class="content">
                                    <h2>Tin 3!</h2>
                                    <p>Noi dung tin 3.</p>
                                    <div class="button">
                                        <a class="btn" href="product-grids.html">Xem ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br> --}}
    <script>
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
   </script>
@endsection

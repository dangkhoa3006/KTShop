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
                    </div>
                </div>
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
                                {{-- <div class="button">
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
                                </div> --}}
                            </div>
                            <div class="product-info">
                                <h4 class="title">
                                    <a href="{{ route('showProduct', $p->slug) }}">{{ $p->name }}</a>
                                </h4>
                                <div class="price">
                                    {{-- <span>{{ number_format($p->sale_price, 0, ',', '.') }} đ</span> --}}
                                    @if ($p->details->isNotEmpty())
                                        <span>{{ number_format($p->details->first()->sale_price, 0, ',', '.') }}</span>
                                    @endif
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
                                {{-- <div class="button">
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
                                </div> --}}
                            </div>
                            <div class="product-info">
                                <h4 class="title">
                                    <a href="{{ route('showProduct', $p->slug) }}">{{ $p->name }}</a>
                                </h4>
                                <div class="price">
                                    @if ($p->details->isNotEmpty())
                                        <span>{{ number_format($p->details->first()->sale_price, 0, ',', '.') }}</span>
                                    @endif
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
                    <div class="section-title" style="margin-top: 20px">
                        <h2>Điện thoại nổi bật khác</h2>
                    </div>
                </div>
                @foreach ($listPhone as $p)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product" style="width: 290px; height: auto;">
                            <div class="product-image">
                                <span class="new-tag">Mới</span>
                                <a href="{{ route('showProduct', $p->slug) }}">
                                    <img style="margin: 35px 30px; width: 220px; max-height: 220px; object-fit: contain;"
                                        src="{{ $p->image }}" alt="#">
                                </a>
                                <div class="button">
                                    {{-- <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                        <input type="hidden" name="name" value="{{ $p->name }}">
                                        <input type="hidden" name="price" value="{{ $p->sale_price }}">
                                        <input type="hidden" name="qty" value="1">
                                        <!-- Mặc định là 1, bạn có thể tùy chỉnh -->
                                        <input type="hidden" name="image" value="{{ $p->image }}">
                                        <button type="submit" class="btn"><i class="lni lni-cart"></i> Thêm</button>
                                    </form> --}}
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
                    <div class="section-title" style="margin-top: 20px">
                        <h2>Máy tính bảng nổi bật</h2>
                    </div>
                </div>
                @foreach ($listPad as $p)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product" style="width: 290px; height: auto;">
                            <div class="product-image">
                                <span class="new-tag">Mới</span>
                                <a href="{{ route('showProduct', $p->slug) }}">
                                    <img style="margin: 35px 30px; width: 220px; max-height: 220px; object-fit: contain;"
                                        src="{{ $p->image }}" alt="#">
                                </a>
                                <div class="button">
                                    {{-- <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                        <input type="hidden" name="name" value="{{ $p->name }}">
                                        <input type="hidden" name="price" value="{{ $p->sale_price }}">
                                        <input type="hidden" name="qty" value="1">
                                        <!-- Mặc định là 1, bạn có thể tùy chỉnh -->
                                        <input type="hidden" name="image" value="{{ $p->image }}">
                                        <button type="submit" class="btn"><i class="lni lni-cart"></i> Thêm</button>
                                    </form> --}}
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
                    <div class="section-title" style="margin-top: 20px">
                        <h2>Smartwatch nổi bật</h2>
                    </div>
                </div>
                @foreach ($listWatch as $p)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product" style="width: 290px; height: auto;">
                            <div class="product-image">
                                <span class="new-tag">Mới</span>
                                <a href="{{ route('showProduct', $p->slug) }}">
                                    <img style="margin: 35px 30px; width: 220px; max-height: 220px; object-fit: contain;"
                                        src="{{ $p->image }}" alt="#">
                                </a>
                                <div class="button">
                                    {{-- <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                        <input type="hidden" name="name" value="{{ $p->name }}">
                                        <input type="hidden" name="price" value="{{ $p->sale_price }}">
                                        <input type="hidden" name="qty" value="1">
                                        <!-- Mặc định là 1, bạn có thể tùy chỉnh -->
                                        <input type="hidden" name="image" value="{{ $p->image }}">
                                        <button type="submit" class="btn"><i class="lni lni-cart"></i> Thêm</button>
                                    </form> --}}
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
                    <div class="section-title" style="margin-top: 20px">
                        <h2>Phụ kiện nổi bật</h2>
                    </div>
                </div>
                @foreach ($listAccessory as $p)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product" style="width: 290px; height: auto;">
                            <div class="product-image">
                                <span class="new-tag">Mới</span>
                                <a href="{{ route('showProduct', $p->slug) }}">
                                    <img style="margin: 35px 30px; width: 220px; max-height: 220px; object-fit: contain;"
                                        src="{{ $p->image }}" alt="#">
                                </a>
                                <div class="button">
                                    {{-- <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                        <input type="hidden" name="name" value="{{ $p->name }}">
                                        <input type="hidden" name="price" value="{{ $p->sale_price }}">
                                        <input type="hidden" name="qty" value="1">
                                        <!-- Mặc định là 1, bạn có thể tùy chỉnh -->
                                        <input type="hidden" name="image" value="{{ $p->image }}">
                                        <button type="submit" class="btn"><i class="lni lni-cart"></i> Thêm</button>
                                    </form> --}}
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
        </div>
    </section>
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

@extends('clients.app-client')
@section('title', 'KTMobile.vn - ' . $product->name)
@section('header-route')
    @parent
    <li class="breadcrumb-item active" style="list-style-type: none;"><a href="{{ route('homepage') }}"><i
                class="lni lni-home"></i> Trang chủ</a></li>
    <li class="breadcrumb-item " style="list-style-type: none;"><a
            href="{{ route('showCategory', $category->slug) }}">{{ $category->name }}</a></li>
    <li class="breadcrumb-item " style="list-style-type: none;"><a
            href="{{ route('showSubCategory', [$category->slug, $subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
    <li class="breadcrumb-item " style="list-style-type: none;">{{ $product->name }}</li>
@endsection
@section('client-content-pages')
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img style="margin: 0px 20%; width: 65%; height: auto; object-fit: contain;"
                                        src="{{ $product->image }}" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <div class="swiper-wrapper">
                                        @foreach ($product->images as $image)
                                            <div class="swiper-slide">
                                                <img style="width: 150px; height: auto;"
                                                    src="{{ asset('storage/' . $image->image_path) }}" class="img"
                                                    alt="#">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="single-product" style="border: none;">
                            <div class="product-info">
                                <h2 class="title">{{ $product->name }}</h2>
                                <p class="category"><i class="lni lni-tag"></i>{{ $product->subcategory->name }}</p>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>(4.6/5) đánh giá</span></li>
                                </ul>
                                <h3 class="price" style="color: darkblue">
                                    {{ number_format($product->sale_price, 0, ',', '.') }}
                                    đ
                                    @if ($product->price && $product->price != 0)
                                        <span style="font-size: 15px">{{ number_format($product->price, 0, ',', '.') }}
                                            đ</span>
                                    @endif
                                </h3>
                                {{-- <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group color-option">
                                        <label class="title-label" for="size">Màu sắc</label>

                                        <div class="item-variant-container">
                                            <ul class="item-variant-list">
                                                <li class="item-variant" style="margin-right: 10px">
                                                    <a href="#" data-index="1" title="Titan Đen"
                                                        class="button__change-color is-flex is-align-items-center">
                                                        <div class="product-image-detail" >
                                                            <img src="{{ $product->image }}"
                                                                alt="Titan Đen">
                                                        </div>
                                                        <div class="product-info">
                                                            <strong class="item-variant-name">Titan Đen</strong>
                                                            <span class="product-price">29.790.000₫</span>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li class="item-variant" style="margin-right: 10px">
                                                    <a href="#" data-index="2" title="Titan Trắng"
                                                        class="button__change-color is-flex is-align-items-center">
                                                        <div class="product-image-detail">
                                                            <img src="{{ $product->image }}" width="50" height="50"
                                                                alt="iPhone 15 Pro Max 256GB | Chính hãng VN/A-Titan Trắng"
                                                                loading="lazy">
                                                        </div>
                                                        <div class="product-info">
                                                            <strong class="item-variant-name">Titan Trắng</strong>
                                                            <span class="product-price">30.790.000₫</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="item-variant" style="margin-right: 10px">
                                                    <a href="#" data-index="1" title="Titan Đen"
                                                        class="button__change-color is-flex is-align-items-center">
                                                        <div class="product-image-detail" >
                                                            <img src="{{ $product->image }}"
                                                                alt="Titan Đen">
                                                        </div>
                                                        <div class="product-info">
                                                            <strong class="item-variant-name">Titan Đen</strong>
                                                            <span class="product-price">29.790.000₫</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                                <div class="bottom-content">
                                    <div class="row align-items-end">
                                        <div class="col-lg-10 col-md-4 col-12">
                                            <div class="button cart-button" style="margin-bottom: 10px">
                                                <button class="btn" id="buy-now-btn" style="width: 100%;">Mua
                                                    ngay</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-12">
                                            <div class="wish-button">
                                                <form action="{{ route('cart.add') }}" method="POST"
                                                    class="add-to-cart-form">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                                    <input type="hidden" name="price"
                                                        value="{{ $product->sale_price }}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <!-- Mặc định là 1, bạn có thể tùy chỉnh -->
                                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                                    <button type="submit" class="btn"><i class="lni lni-cart"></i>
                                                        Thêm vào giỏ hàng</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bottom-content">
                                    <div class="row align-items-end">
                                        <hr>
                                        <div class="col-lg-10 col-md-4 col-12">
                                            <i class="lni lni-mobile" style="font-size: 20px;"></i>
                                            <span style="margin-left: 10px; font-size: 17px">Sản phẩm là máy mới 100% , đầy
                                                đủ phụ kiện.</span>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-12" style="margin-top: 10px">
                                            <i class="lni lni-delivery" style="font-size: 20px;"></i>
                                            <span style="margin-left: 10px; font-size: 17px">Giao hàng miễn phí nội thành
                                                TP.HCM</span>
                                        </div>
                                        <div class="col-lg-12 col-md-4 col-12" style="margin-top: 10px">
                                            <i class="lni lni-dropbox" style="font-size: 20px;"></i>
                                            <span style="margin-left: 10px; font-size: 17px">Bộ sản phẩm: Hộp, máy, cáp,
                                                sách hướng dẫn</span>
                                        </div>
                                        <div class="col-lg-12 col-md-4 col-12" style="margin-top: 10px">
                                            <i class="lni lni-protection" style="font-size: 20px;"></i>
                                            <span style="margin-left: 10px; font-size: 17px">Bảo hành 12 tháng tại trung tâm
                                                bảo hành chính hãng</span>
                                        </div>
                                        <div class="col-lg-12 col-md-4 col-12" style="margin-top: 10px">
                                            <i class="lni lni-money-protection" style="font-size: 20px;"></i>
                                            <span style="margin-left: 10px; font-size: 17px">Thanh toán trực tiếp hoặc qua
                                                thẻ tín dụng Visa, Master, JCB.</span>
                                        </div>
                                        <div class="col-lg-12 col-md-4 col-12" style="margin-top: 10px">
                                            <i class="lni lni-tag" style="font-size: 20px;"></i>
                                            <span style="margin-left: 10px; font-size: 17px">Giá bán đã bao gồm thuế (Xuất
                                                V.A.T) </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="row">
                    <!-- Block 1 -->
                    <!-- HTML -->
                    <!-- HTML -->
                    <div class="col-lg-8 col-12">
                        <div class="single-block">
                            <div class="info-body custom-responsive-margin">
                                <h4>Thông tin sản phẩm</h4>
                                <div class="product-description">
                                    {!! $product->description !!}
                                </div>
                                <button id="read-more-btn" class="btn btn-outline-primary"
                                    style="width: 100%; margin-top: 20px">Xem thêm <i
                                        class="lni lni-angle-double-down"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Block 2 -->
                    <div class="col-lg-4 col-12">
                        <div class="single-block">
                            <div class="info-body">
                                <h6>Cấu hình {{ $product->name }}</h6>
                                {{-- <p>{!! $product->specification !!}</p> --}}
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width: 100px">Cấu hình</th>
                                                <th>Thông số</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->specifications as $index => $spec)
                                                <tr class="spec-row {{ $index >= 8 ? 'd-none' : '' }}">
                                                    <td>{{ $spec->title }}</td>
                                                    <td>{{ $spec->content }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button id="view-more-specs-btn"class="btn btn-secondary btn-icon-split"
                                        style="width: 100%; margin-top: 20px; border-radius: 10px;">
                                        <span class="icon text-white-100">
                                            <i class="lni lni-plus"></i>
                                        </span>
                                        <span class="text">Xem cấu hình chi tiết</span>
                                    </button>
                                    <button id="hide-more-specs-btn" class="btn btn-secondary btn-icon-split d-none"
                                        style="width: 100%; margin-top: 20px; border-radius: 10px;">
                                        <span class="icon text-white-100">
                                            <i class="lni lni-minus"></i>
                                        </span>
                                        <span class="text">Thu gọn</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-20 col-12 custom-padding-right">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <h5 style="font-weight: bold">Hỏi đáp {{ $product->name }}</h5><br>
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
                            <div class="text-right mt-4 b" style="text-align: right ">
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
                                <p style="margin-top: 10px">KTmobile chi nhánh ở quận 10 có sẵn ip15 pm 256gb màu Titan
                                    trắng k
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
        </div>
    </section>
    <script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class 
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });
        //Nút xem thêm bài viết
        document.addEventListener("DOMContentLoaded", function() {
            var description = document.querySelector('.product-description');
            var btn = document.getElementById('read-more-btn');
            var originalHeight = description.clientHeight; // Lưu chiều cao ban đầu

            btn.addEventListener('click', function() {
                if (description.classList.contains('expanded')) {
                    // Nếu đã mở rộng, thu lại
                    description.style.maxHeight = originalHeight + 'px'; // Sử dụng chiều cao ban đầu
                    description.classList.remove('expanded');
                    btn.innerHTML = 'Xem thêm <i class="lni lni-angle-double-down"></i>';
                } else {
                    // Nếu chưa mở rộng, mở rộng
                    description.style.maxHeight = description.scrollHeight +
                        'px'; // Sử dụng chiều cao đầy đủ
                    description.classList.add('expanded');
                    btn.innerHTML = 'Thu gọn <i class="lni lni-angle-double-up"></i>';
                }
            });

            //Nút xem cấu hình chi tiết
            var viewMoreSpecsBtn = document.getElementById('view-more-specs-btn');
            var hideMoreSpecsBtn = document.getElementById('hide-more-specs-btn');
            viewMoreSpecsBtn.addEventListener('click', function() {
                var rows = document.querySelectorAll('.spec-row.d-none');
                rows.forEach(function(row) {
                    row.classList.remove('d-none');
                });
                viewMoreSpecsBtn.style.display = 'none'; // Ẩn nút xem chi tiết
                hideMoreSpecsBtn.classList.remove('d-none'); // Hiển thị nút thu gọn
            });
            hideMoreSpecsBtn.addEventListener('click', function() {
                var rows = document.querySelectorAll('.spec-row');
                rows.forEach(function(row, index) {
                    if (index >= 8) {
                        row.classList.add('d-none');
                    }
                });
                hideMoreSpecsBtn.classList.add('d-none'); // Ẩn nút thu gọn
                viewMoreSpecsBtn.style.display = 'block'; // Hiển thị nút xem chi tiết
            });
        });

        document.getElementById('buy-now-btn').addEventListener('click', function() {
            var form = document.getElementById('add-to-cart-form');
            var formData = new FormData(form);

            // Gửi AJAX request
            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Chuyển hướng đến trang indexCart sau khi thêm thành công
                        window.location.href = '{{ route('indexCart') }}';
                    } else {
                        // Xử lý khi thêm vào giỏ hàng thất bại (nếu cần)
                        alert('Có lỗi xảy ra. Vui lòng thử lại.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra. Vui lòng thử lại.');
                });
        });
    </script>


@endsection

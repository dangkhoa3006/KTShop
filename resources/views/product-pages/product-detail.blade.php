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
                        <div class="product-info">
                            <h2 class="title">{{ $product->name }}</h2>
                            <p class="category"><i class="lni lni-tag"></i>{{ $product->subcategory->name }}</p>
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
                                            <button class="btn" style="width: 100%;">Mua ngay</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button class="btn"><i class="lni lni-cart"></i> Thêm vào giỏ hàng</button>
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
                                                <th>Cấu hình</th>
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
    </script>


@endsection

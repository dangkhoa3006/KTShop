@extends('clients.app-client')
@section('title', 'KTMobile.vn - Trang chủ')
@section('client-content-pages')
    <div class="container">
        <h5>Kết quả tìm kiếm cho: "{{ $keyword }}"</h5>
        <hr>
        @if ($products->isEmpty())
            <p style="font-size: 20px; text-align: center; margin-bottom: 400px;">Không tìm thấy sản phẩm nào.</p>
        @else
            <div class="row">
                @foreach ($products as $product)
                    <div class="single-product" style="width: 290px; height: auto; margin-left: 20px;">
                        <div class="product-image">
                            <span class="new-tag">Mới</span>
                            <a href="{{ route('showProduct', $product->slug) }}">
                                <img style="margin: 35px 30px; width: 220px; max-height: 220px; object-fit: contain;"
                                    src="{{ asset('storage/' . $product->image) }}" alt="#">
                            </a>
                            <div class="button">
                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->sale_price }}">
                                    <input type="hidden" name="qty" value="1">
                                    <!-- Mặc định là 1, bạn có thể tùy chỉnh -->
                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                    <button type="submit" class="btn"><i class="lni lni-cart"></i> Thêm</button>
                                </form>
                            </div>
                        </div>
                        <div class="product-info">
                            <h4 class="title">
                                <a href="{{ route('showProduct', $product->slug) }}">{{ $product->name }}</a>
                            </h4>
                            <div class="price">
                                <span>{{ number_format($product->sale_price, 0, ',', '.') }} đ</span>
                                @if ($product->price && $product->price != 0)
                                    <span class="discount-price">{{ number_format($product->price, 0, ',', '.') }} đ</span>
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
                @endforeach
                <div class="bottom" style="margin-bottom: 250px;"></div>
            </div>
        @endif
    </div>
@endsection

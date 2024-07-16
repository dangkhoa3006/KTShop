@extends('clients.app-client')
@section('title', 'KTMobile.vn - Tra cứu đơn hàng')
@section('client-content-pages')
    <style>
        .rate {
            border-bottom-right-radius: 12px;
            border-bottom-left-radius: 12px
        }

        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 1em;
            font-size: 30px;
            font-weight: 300;
            color: #FFD600;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }

        .buttons {
            top: 10px;
            position: relative
        }

        .rating-submit {
            border-radius: 8px;
            color: #fff;
            height: auto
        }

        .rating-submit:hover {
            color: #fff
        }
    </style>
    <div class="container">
        <div class="payment" style="display:flex; justify-content: center">
            <div class="col-lg-4 col-md-6 col-12">
                <form method="POST" action="{{ route('submitReview') }}">
                    @csrf
                    <div class="card" style="margin-top: 20px; margin-bottom: 50px;">
                        <div class="user-info" style="margin: 20px 20px;">
                            <h4 style="margin-bottom: 5px; text-align: center">Đánh giá sản phẩm</h4>
                            <p style="text-align: center">
                                Nếu đã mua sản phẩm này tại KTMOBILE. Hãy đánh giá ngay để giúp hàng ngàn người chọn mua
                                hàng tốt
                                nhất bạn nhé!
                            </p>
                            <div class=" d-flex justify-content-center mt-1">
                                <div class=" text-center mb-1">
                                    <div class="rating">
                                        <input type="radio" name="rating" value="5" id="5"><label
                                            for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label
                                            for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label
                                            for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label
                                            for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label
                                            for="1">☆</label>
                                    </div>
                                    <div style="color: red">
                                        @if ($errors->has('rating'))
                                            {{ $errors->first('rating') }}<br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 10px;margin-bottom: 10px; color: #333;">
                                <b for="content" class="col-sm-1 col-form-label">Đánh giá</b>
                                <div class="col-sm-15">
                                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Viết đánh giá..."></textarea>
                                </div>
                            </div>
                            <div style="margin-top: 10px; color: #333;">
                                <b for="name" class="col-sm-1 col-form-label">Họ tên</b>
                                <div class="col-sm-15">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $order->username }}" placeholder="Họ tên..." readonly>
                                </div>
                            </div>
                            <div style="margin-top: 10px;margin-bottom: 10px; color: #333;">
                                <b for="phone" class="col-sm-1 col-form-label">Số điện thoại</b>
                                <div class="col-sm-15">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ $order->phone }}" placeholder="Số điện thoại..." readonly>
                                </div>
                            </div>
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <div class="buttons  mt-0"> <button type="submit"
                                    class="btn btn-info px-4 py-1 rating-submit ">Gửi đánh
                                    giá</button> </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card" style="margin-top: 20px; margin-bottom: 100px;">
                    <div class="user-info" style="margin: 20px 20px;">
                        <h4 style="margin-bottom: 5px; text-align: center">Tình trạng đơn hàng</h4>
                        <h5><b>Mã đơn hàng: #{{ $order->code }}</b></h5>
                        <p><b>Tên khách hàng: </b> {{ $order->username }}</p>
                        <p><b>Số điện thoại: </b> {{ $order->phone }}</p>
                        <p><b>Địa chỉ nhận hàng: </b>
                            @if (empty($order->address) && empty($order->ward_name) && empty($order->district_name) && empty($order->province_name))
                                65 đường Huỳnh Thúc Kháng, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh.
                            @else
                                @isset($order->address)
                                    {{ $order->address }},
                                @endisset
                                @isset($order->ward_name)
                                    {{ $order->ward_name }},
                                @endisset
                                @isset($order->district_name)
                                    {{ $order->district_name }},
                                @endisset
                                @isset($order->province_name)
                                    {{ $order->province_name }}.
                                @endisset
                            @endif
                        </p>
                        <p><b>Sản phẩm: </b>
                            @foreach ($orderDetails as $detail)
                                <tr>
                                    <td>{{ $detail->product_name }}</td>
                                    <td> - Số lượng: {{ $detail->quantity }}</td><br>
                                </tr>
                            @endforeach
                        </p>
                        <p><b>Tổng giá trị đơn hàng: </b> <b style="font-size: 20px;">
                                {{ number_format($order->total, 0, ',', '.') }} VND </b></p>
                        <p><b>Hình thức thanh toán: </b>
                            @if ($order->payment_method == 'momo')
                                MoMo QR
                            @endif
                            @if ($order->payment_method == 'cash_money')
                                Tiền mặt
                            @endif
                            @if ($order->payment_method == 'vnpay')
                                Chuyển khoản VNPay
                            @endif
                            @if ($order->payment_method == 'banking_transfer')
                                Chuyển khoản ngân hàng
                            @endif
                            @if ($order->payment_method == null)
                                *Chưa thanh toán*
                            @endif
                        </p>
                        <p><b>Tình trạng: </b>
                            @if ($order->status == 0)
                                Chưa thanh toán
                            @endif
                            @if ($order->status == 1)
                                Đã thanh toán
                            @endif
                            @if ($order->status == 2)
                                Chờ xác nhận
                            @endif
                            @if ($order->status == 3)
                                Đã xác nhận
                            @endif
                        </p>
                        <p style="margin-bottom: 130px;"><b>Trạng thái đơn hàng: </b>
                            @if ($order->delivery_status == 0)
                                <span
                                    style="color: rgb(233, 102, 1); font-weight: bold; background-color: rgb(251, 217, 132)">Đang
                                    xác nhận đơn hàng</span>
                            @endif
                            @if ($order->delivery_status == 1)
                                <span
                                    style="color: rgb(233, 102, 1); font-weight: bold; background-color: rgb(251, 217, 132)">Đã
                                    xác nhận đơn hàng</span>
                            @endif
                            @if ($order->delivery_status == 2)
                                <span
                                    style="color: rgb(2, 2, 136); font-weight: bold; background-color: rgb(45, 255, 244)">Đang
                                    chuẩn bị hàng</span>
                            @endif
                            @if ($order->delivery_status == 3)
                                <span
                                    style="color: rgb(2, 2, 136); font-weight: bold; background-color: rgb(45, 255, 244)">Đơn
                                    hàng đã đến đơn vị vận
                                    chuyển</span>
                            @endif
                            @if ($order->delivery_status == 4)
                                <span
                                    style="color: rgb(2, 2, 136); font-weight: bold; background-color: rgb(45, 255, 244)">Đơn
                                    hàng đang trên đường
                                    giao</span>
                            @endif
                            @if ($order->delivery_status == 5)
                                <span
                                    style="color: rgb(10, 151, 0); font-weight: bold; background-color: rgb(132, 251, 140)">Giao
                                    hàng thành công</span>
                            @endif
                            @if ($order->delivery_status == 6)
                                <span
                                    style="color: rgb(151, 0, 0); font-weight: bold; background-color: rgb(251, 132, 132)">Đã
                                    hủy đơn</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

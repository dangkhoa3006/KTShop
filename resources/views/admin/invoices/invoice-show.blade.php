@extends('admin.app')
@section('title', 'Admin - Quản lý đơn hàng')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Quản lý đơn hàng</a></li>
    <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
@endsection
@section('invoice-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Chi tiết hóa đơn</h5>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 style="text-align: center; font-weight: bold;">KTMOBILE SHOP</h5>
                    <hr>
                    <h5><b>Mã đơn hàng: #{{ $list->code }}</b></h5>
                    <p><b>Tên khách hàng: </b> {{ $list->username }}</p>
                    <p><b>Số điện thoại: </b> {{ $list->phone }}</p>
                    <p><b>Địa chỉ nhận hàng: </b>
                        @if (empty($list->address) && empty($list->ward_name) && empty($list->district_name) && empty($list->province_name))
                            65 đường Huỳnh Thúc Kháng, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh.
                        @else
                            @isset($list->address)
                                {{ $list->address }},
                            @endisset
                            @isset($list->ward_name)
                                {{ $list->ward_name }},
                            @endisset
                            @isset($list->district_name)
                                {{ $list->district_name }},
                            @endisset
                            @isset($list->province_name)
                                {{ $list->province_name }}.
                            @endisset
                        @endif
                    </p>
                    <p><b>Nội dung: </b>
                        @foreach ($orderDetails as $detail)
                            <tr>
                                <td>{{ $detail->product->name }}</td>
                                <td> - Số lượng: {{ $detail->quantity }}</td><br>
                            </tr>
                        @endforeach
                    </p>
                    <p><b>Tổng giá trị đơn hàng: </b> <b style="font-size: 20px;">
                            {{ number_format($list->total, 0, ',', '.') }} VND </b></p>
                    <p><b>Hình thức thanh toán: </b>
                        @if ($list->payment_method == 'momo')
                            MoMo QR
                        @endif
                        @if ($list->payment_method == 'cash_money')
                            Tiền mặt
                        @endif
                        @if ($list->payment_method == 'vnpay')
                            Chuyển khoản VNPay
                        @endif
                        @if ($list->payment_method == 'banking_transfer')
                            Chuyển khoản ngân hàng
                        @endif
                        @if ($list->payment_method == null)
                            *Chưa thanh toán*
                        @endif
                    </p>
                    <p><b>Tình trạng: </b>
                        @if ($list->status == 0)
                            Chưa thanh toán
                        @endif
                        @if ($list->status == 1)
                            Đã thanh toán
                        @endif
                        {{-- Đã chuyển khoản ngân hàng hoặc thanh toán khi nhận hàng  --}}
                        @if ($list->status == 2)
                            Chờ xác nhận
                        @endif
                        {{-- Đã xác nhận đơn hàng: chuyển khoản hoặc thanh toán trực tiếp --}}
                        @if ($list->status == 3)
                            Đã xác nhận
                        @endif
                    </p>
                    <a href="{{ route('invoices.edit', $list->id) }}" class="btn btn-success btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Cập nhật trạng thái đơn hàng</span>
                    </a>
                    <a href="{{ route('invoices.print', $list->id) }}" class="btn btn-warning btn-icon-split float-right"
                        target="_blank" style="margin-right: 5px;">
                        <span class="icon text-white-50">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text">In đơn hàng</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

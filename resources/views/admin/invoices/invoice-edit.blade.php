@extends('admin.app')
@section('title', 'Admin - Quản lý đơn hàng')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Quản lý đơn hàng</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cập nhật đơn hàng</li>
@endsection
@section('invoice-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Cập nhật đơn hàng</h5>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 style="text-align: center; font-weight: bold;">KTMOBILE SHOP</h5><hr>
                    <h5><b>Mã đơn hàng:  #{{ $invoice->code }}</b></h5>
                    <p><b>Tên khách hàng: </b> {{ $invoice->username }}</p>
                    <p><b>Số điện thoại: </b> {{ $invoice->phone }}</p>
                    <p><b>Địa chỉ nhận hàng: </b>
                        @if (empty($invoice->address) && empty($invoice->ward_name) && empty($invoice->district_name) && empty($invoice->province_name))
                            65 đường Huỳnh Thúc Kháng, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh.
                        @else
                            @isset($invoice->address)
                                {{ $invoice->address }},
                            @endisset
                            @isset($invoice->ward_name)
                                {{ $invoice->ward_name }},
                            @endisset
                            @isset($invoice->district_name)
                                {{ $invoice->district_name }},
                            @endisset
                            @isset($invoice->province_name)
                                {{ $invoice->province_name }}.
                            @endisset
                        @endif
                    </p>
                    <p><b>Nội dung: </b> 
                        @foreach($orderDetails as $detail)
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td> - Số lượng: {{ $detail->quantity }}</td><br>
                        </tr>
                    @endforeach
                    </p>
                    <p><b>Tổng giá trị đơn hàng: </b> <b style="font-size: 20px;"> {{number_format($invoice->total, 0, ',', '.')}} VND </b></p>
                    <p><b>Hình thức thanh toán: </b>
                        @if ($invoice->payment_method == 'momo')
                            MoMo QR
                        @endif
                        @if ($invoice->payment_method == 'cash_money')
                            Tiền mặt
                        @endif
                        @if ($invoice->payment_method == 'vnpay')
                            Chuyển khoản VNPay
                        @endif
                        @if ($invoice->payment_method == 'banking_transfer')
                            Chuyển khoản ngân hàng
                        @endif
                        @if ($invoice->payment_method == null)
                            *Chưa thanh toán*
                        @endif
                    </p>
                    <form action="{{ route('invoices.updateStatus', $invoice->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="status"> <b>Trạng thái:</b></label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" {{ $invoice->status == 0 ? 'selected' : '' }}>Chưa thanh toán</option>
                                <option value="1" {{ $invoice->status == 1 ? 'selected' : '' }}>Đã thanh toán</option>
                                <option value="2" {{ $invoice->status == 2 ? 'selected' : '' }}>Chờ xác nhận</option>
                                <option value="3" {{ $invoice->status == 3 ? 'selected' : '' }}>Đã xác nhận</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="delivery_status"> <b>Trạng thái giao hàng:</b></label>
                            <select name="delivery_status" id="delivery_status" class="form-control">
                                <option value="0" {{ $invoice->delivery_status == 0 ? 'selected' : '' }}>Đang xác nhận đơn hàng</option>
                                <option value="1" {{ $invoice->delivery_status == 1 ? 'selected' : '' }}>Đã xác nhận đơn hàng</option>
                                <option value="2" {{ $invoice->delivery_status == 2 ? 'selected' : '' }}>Đang chuẩn bị hàng</option>
                                <option value="3" {{ $invoice->delivery_status == 3 ? 'selected' : '' }}>Đơn hàng đã đến đơn vị vận chuyển</option>
                                <option value="4" {{ $invoice->delivery_status == 4 ? 'selected' : '' }}>Đơn hàng đang trên đường giao</option>
                                <option value="5" {{ $invoice->delivery_status == 5 ? 'selected' : '' }}>Giao hàng thành công</option>
                                <option value="6" {{ $invoice->delivery_status == 6 ? 'selected' : '' }}>Đã hủy đơn</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

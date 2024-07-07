@extends('admin.app')
@section('title', 'Admin - Quản lý hóa đơn')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Quản lý hóa đơn</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cập nhật hóa đơn</li>
@endsection
@section('invoice-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Cập nhật hóa đơn</h5>
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
                    {{-- <p><b>Tình trạng: </b>
                        @if ($list -> status == 0)
                            Chưa thanh toán
                        @endif
                        @if ($list -> status == 1)
                            Đã thanh toán
                        @endif
                        @if ($list -> status == 2)
                            Chờ xác nhận
                        @endif
                        @if ($list -> status == 3)
                            Đã xác nhận
                        @endif
                    </p> --}}
                    {{-- <a href="{{route('invoices.updateStatus', $invoice->id)}}" class="btn btn-success btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Cập nhật trạng thái đơn hàng</span>
                    </a> --}}
                    <form action="{{ route('invoices.updateStatus', $invoice->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Các trường input cho cập nhật trạng thái và delivery_status -->
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
                                <option value="5" {{ $invoice->delivery_status == 5 ? 'selected' : '' }}>Đã nhận được hàng</option>
                                <option value="6" {{ $invoice->delivery_status == 6 ? 'selected' : '' }}>Đã hủy đơn</option>

                            </select>
                        </div>
                    
                        <!-- Nút submit để gửi form -->
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    
                   
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.app')
@section('title', 'Admin - Quản lý đơn hàng')
@section('header-route')
    @parent <li class="breadcrumb-item active" aria-current="page">Quản lý đơn hàng</li>
@endsection
@section('invoice-active', 'active')
@section('content-pages')
    @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible" role="alert"
            style="position: fixed; top: 80px; left: 63%; width: 35%;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-check"></i><b> Thành công!</b></h6>
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div id="stop-alert" class="alert alert-danger alert-dismissible" role="alert"
            style="position: fixed; top: 80px; left: 63%; width: 35%;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Không thành công!</b></h6>
            {{ session('error') }}
        </div>
    @endif
    <h5 class="h4 mb-2 text-gray-800">Danh sách hóa đơn</h5>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <a href="{{ route('invoices.trash') }}" class="btn btn-primary float-left">
                        Đơn hàng đã hủy
                    </a>
                    <div class="clearfix"></div>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Hình thức thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Tình trạng đơn hàng</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $bill)
                                <tr>
                                    <td>#{{ $bill->code }}</td>
                                    <td>{{ $bill->username }}</td>
                                    <td>{{ $bill->phone }}</td>
                                    <td>
                                        @if ($bill->payment_method == 'momo')
                                            MoMo QR
                                        @endif
                                        @if ($bill->payment_method == 'cash_money')
                                            Tiền mặt
                                        @endif
                                        @if ($bill->payment_method == 'vnpay')
                                            Chuyển khoản VNPay
                                        @endif
                                        @if ($bill->payment_method == 'banking_transfer')
                                            Chuyển khoản ngân hàng
                                        @endif
                                        @if ($bill->payment_method == null)
                                            *Không có*
                                        @endif
                                    </td>
                                    <td>
                                        @if ($bill->status == 1)
                                            <span class="badge badge-success" style="font-size: 14px">Đã thanh toán</span>
                                        @endif
                                        @if ($bill->status == 2)
                                            <span class="badge badge-warning" style="font-size: 14px">Chờ xác nhận</span>
                                        @endif
                                        @if ($bill->status == 0)
                                            <span class="badge badge-danger" style="font-size: 14px">Chưa thanh toán</span>
                                        @endif
                                        @if ($bill->status == 3)
                                            <span class="badge badge-success" style="font-size: 14px">Đã xác nhận</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($bill->delivery_status == 0)
                                            <span class="badge badge-warning" style="font-size: 14px">Đang xác nhận đơn
                                                hàng</span>
                                        @endif
                                        @if ($bill->delivery_status == 1)
                                            <span class="badge badge-warning" style="font-size: 14px">Đã xác nhận đơn
                                                hàng</span>
                                        @endif
                                        @if ($bill->delivery_status == 2)
                                            <span class="badge badge-primary" style="font-size: 14px">Đang chuẩn bị
                                                hàng</span>
                                        @endif
                                        @if ($bill->delivery_status == 3)
                                            <span class="badge badge-primary" style="font-size: 14px">Đơn hàng đã đến đơn vị
                                                vận chuyển</span>
                                        @endif
                                        @if ($bill->delivery_status == 4)
                                            <span class="badge badge-primary" style="font-size: 14px">Đơn hàng đang trên
                                                đường giao</span>
                                        @endif
                                        @if ($bill->delivery_status == 5)
                                            <span class="badge badge-success" style="font-size: 14px">Giao hàng thành
                                                công</span>
                                        @endif
                                        @if ($bill->delivery_status == 6)
                                            <span class="badge badge-danger" style="font-size: 14px">Đã hủy đơn</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!($bill->status == 1 && $bill->delivery_status == 5))
                                            <form action="{{ route('invoices.destroy', $bill->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">
                                                        Hủy đơn
                                                    </span>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('invoices.show', $bill->id) }}"
                                            class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            <span class="text">
                                                Chi tiết
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

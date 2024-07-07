@extends('admin.app')
@section('title', 'Admin - Quản lý hóa đơn')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Quản lý hóa đơn</a></li>
    <li class="breadcrumb-item active" aria-current="page">Hóa đơn đã hủy</li>

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
    <h5 class="h4 mb-2 text-gray-800">Danh sách hóa đơn đã hủy</h5>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <a href="{{ route('invoices.index') }}" class="btn btn-primary btn-icon-split float-left">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Trở lại</span>
                    </a>
                    <div class="clearfix"></div> <!--  này giúp clear float -->
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Tên khách hàng</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Ngày hủy</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trashedOrders as $order)
                                <tr>
                                    <td>#{{ $order->code }}</td>
                                    <td>{{ $order->username }}</td>
                                    <td>
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
                                    </td>
                                    <td>
                                        @if ($order->status == 1)
                                            <span class="badge badge-success" style="font-size: 14px">Đã thanh toán</span>
                                        @endif
                                        @if ($order->status == 2)
                                            <span class="badge badge-warning" style="font-size: 14px">Chờ xác nhận</span>
                                        @endif
                                        @if ($order->status == 0)
                                            <span class="badge badge-danger" style="font-size: 14px">Chưa thanh toán</span>
                                        @endif
                                    </td>

                                    <td>{{ $order->deleted_at }}</td>
                                    <td>
                                        <form action="{{ route('invoices.restore', $order->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash-restore-alt"></i>
                                                </span>
                                                <span class="text">
                                                    Khôi phục
                                                </span>
                                            </button>
                                        </form>
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

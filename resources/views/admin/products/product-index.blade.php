@extends('admin.app')
@section('title', 'Admin - Quản lý sản phẩm')
@section('header-route')
    @parent <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
@endsection
@section('product-active', 'active')
@section('content-pages')
    <!--Xuất thông báo sau khi tạo tài khoản-->
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

    <h5 class="h4 mb-2 text-gray-800">Danh sách sản phẩm</h5>

    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Thêm sản phẩm</span>
                    </a>
                    <div class="clearfix"></div> <!--  này giúp clear float -->
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Giá khuyến mãi</th>
                                <th>Số lượng</th>
                                <th>Tình trạng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listProduct as $p)
                                <tr>
                                    <td>
                                        <img style="width:100px; max-height:100px; object-fit:contain"
                                            src="{{ $p->image }}">
                                    </td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->subcategory->name }}</td>
                                    <td>{{ number_format($p->price, 0, ',', '.') }} đ</td>
                                    <td>
                                        @if ($p->details->isNotEmpty())
                                            {{ number_format($p->details->first()->sale_price, 0, ',', '.') }} đ
                                        @else
                                            Không có
                                        @endif
                                    </td>
                                    <td>{{ $p->details->sum('quantity') }}</td>
                                    <td>
                                        @if ($p->details->sum('quantity') > 0)
                                            <span class="badge badge-success" style="font-size: 14px">Còn hàng</span>
                                        @else
                                            <span class="badge badge-warning" style="font-size: 14px">Hết hàng</span>
                                        @endif
                                    </td>
                                    <td style="display: flex; justify-content: center;">
                                        <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-primary"
                                            style="font-size: 14px; ">Cập nhật</a>
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




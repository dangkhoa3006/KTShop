@extends('admin.app')
@section('title', 'Admin - Quản lý loại sản phẩm')
@section('header-route')
    @parent <li class="breadcrumb-item active" aria-current="page">Quản lý loại sản phẩm</li>
@endsection
@section('subcategory-active', 'active')
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

    <h5 class="h4 mb-2 text-gray-800">Danh sách loại sản phẩm</h5>

    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <a href="{{ route('subcategories.create') }}" class="btn btn-primary btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Thêm loại sản phẩm</span>
                    </a>
                    <div class="clearfix"></div> <!--  này giúp clear float -->
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Tên loại sản phẩm</th>
                                <th>Slug</th>
                                <th>Danh mục</th>
                                <th>Tổng sản phẩm</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $subcate)
                                <tr>
                                    <td>{{ $subcate->name }}</td>
                                    <td>{{ $subcate->slug }}</td>
                                    <td>{{ $subcate->category_name }}</td>
                                    <td>{{ $subcate->product_count }}</td>
                                    <td>
                                        @if ($subcate->status == 1)
                                            <span class="badge badge-success" style="font-size: 14px">Hoạt động</span>
                                        @endif
                                    </td>
                                    <td style="display: flex; justify-content: center;">
                                        <a href="{{ route('subcategories.edit', $subcate) }}" class="btn btn-sm btn-primary"
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

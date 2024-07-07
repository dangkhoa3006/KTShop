@extends('admin.app')
@section('title', 'Admin - Quản lý bình luận')
@section('header-route')
    @parent <li class="breadcrumb-item active" aria-current="page">Quản lý bình luận</li>
@endsection
@section('comment-active', 'active')
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

    <h5 class="h4 mb-2 text-gray-800">Danh sách bình luận</h5>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Bình luận</th>
                                <th>Sản phẩm</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $cmt)
                                <tr>
                                    <td>{{ $cmt->name }}</td>
                                    <td>{{ $cmt->email }}</td>
                                    <td>{{ $cmt->content }}</td>
                                    <td>{{$cmt->product->name}}</td>
                                    <td>
                                        @if ($cmt->status == 1)
                                            <span class="badge badge-success" style="font-size: 14px">Đã duyệt</span>
                                        @endif
                                        @if ($cmt->status == 0)
                                            <span class="badge badge-danger" style="font-size: 14px">Chưa duyệt</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('comments.edit', $cmt)}}" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            <span class="text">
                                                Cập nhật
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

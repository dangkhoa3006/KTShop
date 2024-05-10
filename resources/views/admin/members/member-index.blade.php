@php
    use Carbon\Carbon;
@endphp
@extends('admin.app')
@section('title', 'Admin - Quản lý thành viên')
@section('header-route')
    @parent <li class="breadcrumb-item active" aria-current="page">Quản lý thành viên</li>
@endsection
@section('member-active', 'active')
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

    <h5 class="h4 mb-2 text-gray-800">Danh sách thành viên</h5>

    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã thành viên</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Điểm</th>
                                <th>Thời hạn thẻ</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->code }}</td>
                                    <td>{{ $member->user->name }}</td>
                                    <td>{{ $member->user->phone }}</td>
                                    <td>{{ $member->score }}</td>
                                    <td>{{ Carbon::parse($member->end_day)->format('d/m/Y') }}</td>
                                    <td>
                                        @if ($member->user->status == 1)
                                            <span class="badge badge-success" style="font-size: 14px">Hoạt động</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('members.show', $member)}}" class="btn btn-sm btn-primary" style="font-size: 14px">Chi
                                            tiết</a>
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

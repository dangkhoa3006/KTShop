@extends('admin.app')
@section('title', 'Admin - Báo cáo thống kê')
@section('header-route')
    @parent <li class="breadcrumb-item active" aria-current="page">Quản lý tài khoản</li>
@endsection
@section('account-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Danh sách tài khoản nhân viên</h5>
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <a href="{{route('accounts.create')}}" class="btn btn-primary btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Thêm tài khoản</span>
                    </a>
                    <div class="clearfix"></div> <!--  này giúp clear float -->
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Chức vụ</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>system.tiger@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-warning" style="font-size: 14px">Nhân viên</span></td>
                                <td><span class="badge badge-success" style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary" style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>winter.rett@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-warning" style="font-size: 14px">Nhân viên</span></td>
                                <td><span class="badge badge-success" style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary" style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>coxton.hash@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-warning" style="font-size: 14px">Nhân viên</span></td>
                                <td><span class="badge badge-success" style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary" style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>ced.keely@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-warning" style="font-size: 14px">Nhân viên</span></td>
                                <td><span class="badge badge-success" style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary" style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>satou.airi789@gmai.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-danger"style="font-size: 14px">Admin</span></td>
                                <td><span class="badge badge-success"style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary"style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>williamson.brio@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-warning" style="font-size: 14px">Nhân viên</span></td>
                                <td><span class="badge badge-success" style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary" style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>chandler.ios1226@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-warning" style="font-size: 14px">Nhân viên</span></td>
                                <td><span class="badge badge-success" style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary" style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>davidson456@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-warning" style="font-size: 14px">Nhân viên</span></td>
                                <td><span class="badge badge-success" style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary" style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Colleen Hurst</td>
                                <td>colleen.info@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-warning" style="font-size: 14px">Nhân viên</span></td>
                                <td><span class="badge badge-success" style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary" style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Sonya Frost</td>
                                <td>sonya.frost@gmail.com</td>
                                <td>0123456789</td>
                                <td><span class="badge badge-warning" style="font-size: 14px">Nhân viên</span></td>
                                <td><span class="badge badge-success" style="font-size: 14px">Hoạt động</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary" style="font-size: 14px">Chi tiết</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

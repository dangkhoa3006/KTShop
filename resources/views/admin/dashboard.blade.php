@extends('admin.app')
@section('title', 'Admin - Báo cáo thống kê')
@section('header-route')
    @parent <li class="breadcrumb-item active" aria-current="page">Báo cáo thống kê</li>
@endsection
@section('content-pages')
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng doanh thu
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,400,000 VND</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                                    3.48%</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng đơn hàng
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">650 đơn</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>
                                    12%</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Khách hàng mới
                            </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366 khách</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>
                                    20.4%</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Đơn hàng chưa
                                duyệt
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18 đơn</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i>
                                    1.10%</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Báo cáo doanh thu theo tháng</h6>
                    {{-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button"
                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div> --}}
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm bán chạy nhất</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Trong tháng <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Chọn khoảng thời gian</div>
                            <a class="dropdown-item" href="#">Trong ngày</a>
                            <a class="dropdown-item" href="#">Trong tuần</a>
                            <a class="dropdown-item active" href="#">Trong tháng</a>
                            <a class="dropdown-item" href="#">Trong năm</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="small text-gray-500">Iphone 15 promax 128GB
                            <div class="small float-right"><b>200 chiếc</b></div>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="small text-gray-500">Samsung Galaxy S24 Ultra 5G 512GB
                            <div class="small float-right"><b>150 chiếc</b></div>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="small text-gray-500">Oppo Reno 11 F 5G
                            <div class="small float-right"><b>90 chiếc</b></div>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 55%" aria-valuenow="55"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="small text-gray-500">vivo Y36
                            <div class="small float-right"><b>50 chiếc</b></div>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="small text-gray-500">Nokia 105 4G Pro
                            <div class="small float-right"><b>20 chiếc</b></div>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="30"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a class="m-0 medium text-primary card-link" href="#">Xem thêm <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <!-- Invoice Example -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Hóa đơn mới nhất</h6>
                    <a class="m-0 float-right btn btn-danger btn-sm" href="#">Xem thêm <i
                            class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Sản phẩm</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">RA0449</a></td>
                                <td>Udin Wayang</td>
                                <td>Nasi Padang</td>
                                <td><span class="badge badge-success">Đã duyệt</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary">Chi tiết</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">RA5324</a></td>
                                <td>Jaenab Bajigur</td>
                                <td>Gundam 90' Edition</td>
                                <td><span class="badge badge-warning">Đang chờ duyệt</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary">Chi tiết</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">RA1453</a></td>
                                <td>Indri Junanda</td>
                                <td>Hat Rounded</td>
                                <td><span class="badge badge-success">Đã duyệt</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary">Chi tiết</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">RA8568</a></td>
                                <td>Rivat Mahesa</td>
                                <td>Oblong T-Shirt</td>
                                <td><span class="badge badge-danger">Chưa duyệt</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary">Chi tiết</a></td>
                            </tr>

                            {{-- <tr>
                            <td><a href="#">RA1453</a></td>
                            <td>Indri Junanda</td>
                            <td>Hat Rounded</td>
                            <td><span class="badge badge-info">Đang chuẩn bị hàng</span></td>
                            <td><a href="#" class="btn btn-sm btn-primary">Chi tiết</a></td>
                        </tr> --}}
                            <tr>
                                <td><a href="#">RA1998</a></td>
                                <td>Udin Cilok</td>
                                <td>Baby Powder</td>
                                <td><span class="badge badge-success">Đã duyệt</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary">Chi tiết</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <!-- Message From Customer-->
        {{-- <div class="col-xl-4 col-lg-5 ">
        <div class="card">
            <div
                class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-light">Message From Customer</h6>
            </div>
            <div>
                <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="#">
                        <div class="text-truncate message-title">Hi there! I am wondering if you
                            can help me with a
                            problem I've been having.</div>
                        <div class="small text-gray-500 message-time font-weight-bold">Udin Cilok ·
                            58m</div>
                    </a>
                </div>
                <div class="customer-message align-items-center">
                    <a href="#">
                        <div class="text-truncate message-title">But I must explain to you how all
                            this mistaken idea
                        </div>
                        <div class="small text-gray-500 message-time">Nana Haminah · 58m</div>
                    </a>
                </div>
                <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="#">
                        <div class="text-truncate message-title">Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit
                        </div>
                        <div class="small text-gray-500 message-time font-weight-bold">Jajang
                            Cincau · 25m</div>
                    </a>
                </div>
                <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="#">
                        <div class="text-truncate message-title">At vero eos et accusamus et iusto
                            odio dignissimos
                            ducimus qui blanditiis
                        </div>
                        <div class="small text-gray-500 message-time font-weight-bold">Udin Wayang
                            · 54m</div>
                    </a>
                </div>
                <div class="card-footer text-center">
                    <a class="m-0 small text-primary card-link" href="#">View More <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection

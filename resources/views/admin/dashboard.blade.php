@extends('admin.app')
@section('title', 'Admin - Báo cáo thống kê')
@section('header-route')
    @parent <li class="breadcrumb-item active" aria-current="page">Báo cáo thống kê</li>
@endsection
@section('dashboard-active', 'active')
@section('content-pages')
    <div class="row mb-3">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng doanh thu
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($totalAmount, 0, ',', '.') }} VND</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng đơn hàng
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orderCount }} đơn</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Thành viên mới
                            </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $memberCount }} khách</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Đơn hàng chưa
                                duyệt
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $invoiceIncompleteCount }} đơn</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
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
                    <div class="dropdown no-arrow">
                    </div>
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
                    <h6 class="m-0 font-weight-bold text-primary">Top 6 sản phẩm bán chạy nhất</h6>
                </div>
                <div class="card-body">
                    @foreach ($bestSellingProducts as $product)
                        <div class="mb-3">
                            <div class="small text-gray-500">{{ $product->product->name }}
                                <div class="small float-right"><b>{{ $product->total_quantity }} chiếc</b></div>
                            </div>
                            <div class="progress" style="height: 12px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $product->total_quantity / 2 }}%"
                                    aria-valuenow="{{ $product->total_quantity / 2 }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        var monthlyData = @json(array_values($monthlyData));
    </script>
@endsection

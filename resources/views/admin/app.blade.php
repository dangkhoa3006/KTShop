<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="../../../assets_admin/img/logo/icon_dashboard.png" rel="icon">
    <title>@yield('title')</title>
    <link href="../../../assets_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../../assets_admin/css/ruang-admin.css" rel="stylesheet">
    <link href="../../../assets_admin/css/ktmobile-admin.css" rel="stylesheet">
    <link href="../../../assets_admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="../../../assets_admin/vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap DatePicker -->
    <link href="../../../assets_admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Bootstrap Touchspin -->
    <link href="../../../assets_admin/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet">
    <!-- ClockPicker -->
    <link href="../../../assets_admin/vendor/clock-picker/clockpicker.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route('dashboard.index') }}">
                <div class="sidebar-brand-icon">
                    <img src="../../../assets_admin/img/logo/smartphone.png" style="filter: invert(100%); width: 40px">
                </div>
                <div class="sidebar-brand-text mx-1" style="font-size: 25px">KTMobile</div>
            </a>
            {{-- Trang Dashboard --}}
            <li class="nav-item @yield('dashboard-active')">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    {{-- <a class="nav-link" href="#"> --}}

                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Báo cáo thống kê</span></a>
            </li>
            <hr class="sidebar-divider">
            {{-- Trang sản phẩm --}}
            <div class="sidebar-heading">
                Sản phẩm
            </div>
            <li class="nav-item @yield('product-active')">
                <a class="nav-link" href="{{ route('products.index') }}">
                    <i class="fas fa-fw fa-mobile"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
            </li>
            <li class="nav-item @yield('subcategory-active')">
                <a class="nav-link" href="{{ route('subcategories.index') }}">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Quản lý loại sản phẩm</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            {{-- Trang danh mục --}}
            <div class="sidebar-heading">
                Danh mục sản phẩm
            </div>
            <li class="nav-item @yield('category-active')">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Quản lý danh mục</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            {{-- Trang nhà cung cấp --}}
            {{-- <div class="sidebar-heading">
                Slider, banner, logo
            </div>
            <li class="nav-item">
                <a class="nav-link" href="ui-colors.html">
                    <i class="fas fa-fw fa-palette"></i>
                    <span>Quản lý slider</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ui-colors.html">
                    <i class="fas fa-fw fa-palette"></i>
                    <span>Quản lý logo</span>
                </a>
            </li> --}}
            {{-- <hr class="sidebar-divider"> --}}
            {{-- Trang hóa đơn --}}
            <div class="sidebar-heading">
                Hóa đơn
            </div>
            <li class="nav-item @yield('invoice-active')">
                <a class="nav-link" href="{{ route('invoices.index') }}">
                    <i class="fas fa-fw fa-file-invoice-dollar"></i>
                    <span>Quản lý đơn hàng</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            {{-- Trang tài khoản người dùng --}}
            @if (Auth::check() && Auth::user()->role == 1)
                <div class="sidebar-heading">
                    Tài khoản
                </div>
                <li class="nav-item @yield('account-active')">
                    <a class="nav-link" href="{{ route('accounts.index') }}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Quản lý tài khoản</span>
                    </a>
                </li>
                <li class="nav-item @yield('member-active')">
                    <a class="nav-link" href="{{ route('members.index') }}">
                        <i class="fas fa-fw fa-user-friends"></i>
                        <span>Quản lý khách hàng</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
            @endif
            {{-- Bài viết --}}
            {{-- <div class="sidebar-heading">
                Bài viết sản phẩm
            </div>
            <li class="nav-item">
                <a class="nav-link" href="ui-colors.html">
                    <i class="fas fa-fw fa-palette"></i>
                    <span>Quản lý bài viết</span>
                </a>
            </li>
            <hr class="sidebar-divider"> --}}
            {{-- Tin tức --}}
            {{-- <div class="sidebar-heading">
                Tin tức
            </div>
            <li class="nav-item">
                <a class="nav-link" href="ui-colors.html">
                    <i class="fas fa-fw fa-palette"></i>
                    <span>Quản lý tin tức</span>
                </a>
            </li>
            <hr class="sidebar-divider"> --}}
            {{-- Trang ưu đãi và khuyến mãi --}}
            {{-- <div class="sidebar-heading">
                Giảm giá và khuyến mãi
            </div>
            <li class="nav-item">
                <a class="nav-link" href="ui-colors.html">
                    <i class="fas fa-fw fa-palette"></i>
                    <span>Quản lý giảm giá và khuyến mãi</span>
                </a>
            </li>
            <hr class="sidebar-divider"> --}}
            {{-- Trang bình luận và đánh giá --}}
            <div class="sidebar-heading">
                Bình luận và đánh giá
            </div>
            <li class="nav-item @yield('comment-active')">
                <a class="nav-link" href="{{ route('comments.index') }}">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Quản lý bình luận</span>
                </a>
            </li>
            <li class="nav-item @yield('review-active')">
                <a class="nav-link" href="{{ route('reviews.index') }}">
                    <i class="fas fa-fw fa-comment-dots"></i>
                    <span>Quản lý đánh giá</span>
                </a>
            </li>
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" style="background-color: 	#F0F0F0">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 small"
                                            placeholder="Tìm kiếm...." aria-label="Search"
                                            aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Thông báo
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to
                                            download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                    Alerts</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <span class="badge badge-warning badge-counter">2</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Tin nhắn
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../assets_admin/img/man.png"
                                            style="max-width: 60px" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been
                                            having.</div>
                                        <div class="small text-gray-500">Udin Cilok · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../assets_admin/img/girl.png"
                                            style="max-width: 60px" alt="">
                                        <div class="status-indicator bg-default"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people
                                            say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Jaenab · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More
                                    Messages</a>
                            </div>
                        </li>
                        @auth
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (Auth::user()->avatar)
                                        <img class="img-profile rounded-circle"
                                            src="{{ asset('storage/' . Auth::user()->avatar) }}" style="max-width: 60px">
                                    @else
                                        <img class="img-profile rounded-circle"
                                            src="{{ asset('assets_admin/img/boy.png') }}" style="max-width: 60px">
                                    @endif


                                    <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('editAdminProfile') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Thông tin tài khoản
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                            data-target="#logoutModal" style="color: red" type="submit">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color: red"></i>
                                            Đăng xuất
                                        </a>
                                    </form>

                                </div>
                            </li>
                        @endauth
                    </ul>
                </nav>
                <!-- Container Fluid-->
                <!-- content -->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <ol class="breadcrumb">
                            @section('header-route')

                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}

                                {{-- <li class="breadcrumb-item active" aria-current="page">Báo cáo thống kê</li> --}}
                            @show

                        </ol>
                    </div>
                    <!--content page-->
                    <div class="container-pages">

                        @yield('content-pages')
                    </div>

                    <!--Row-->

                    <!-- Thông báo đăng xuất - Alert dialog-->
                    @auth
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelLogout">ĐĂNG XUẤT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn muốn đăng xuất tài khoản?</p>
                                    </div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger"
                                                data-dismiss="modal">Hủy</button>
                                            <button class="btn btn-primary" type="submit">Đăng xuất</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endauth


                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> - developed by <b>KTMobile store</b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="../../../assets_admin/vendor/jquery/jquery.js"></script>
    <script src="../../../assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets_admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../../assets_admin/js/ruang-admin.js"></script>
    <script src="../../../assets_admin/vendor/chart.js/Chart.min.js"></script>
    <script src="../../../assets_admin/js/demo/chart-area-demo.js"></script>
    <!-- Page level plugins -->
    <script src="../../../assets_admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../assets_admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>




    <!-- Select2 -->
    <script src="../../../assets_admin/vendor/select2/dist/js/select2.min.js"></script>
    <!-- Bootstrap Datepicker -->
    <script src="../../../assets_admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Bootstrap Touchspin -->
    <script src="../../../assets_admin/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
    <!-- ClockPicker -->
    <script src="../../../assets_admin/vendor/clock-picker/clockpicker.js"></script>

    <!-- Page level custom scripts -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
            //choose datetime of staff
            $('#simple-date3 .input-group.date').datepicker({
                startView: 2,
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });
            $('#touchSpin1').TouchSpin({
                min: 0,
                max: 100,
                boostat: 5,
                maxboostedstep: 10,
                initval: 0
            });
            // Kiểm tra giá trị nhập vào và giới hạn nếu vượt quá max
            $('#touchSpin3').on('input', function() {
                var max = parseInt($(this).attr('max'));
                if ($(this).val() > max) {
                    $(this).val(max);
                }
            });
            // $('#touchSpin3').TouchSpin({
            //     min: 0,
            //     max: 10000000000,
            //     initval: 0,
            //     boostat: 5,
            //     maxboostedstep: 10,
            //     verticalbuttons: true,
            // });

            //select districts from provinces
            $("#selectProvinces").change(function() {
                var province_id = $(this).val();
                if (province_id == "") {
                    var province_id = 0;
                }
                $.ajax({
                    url: '{{ url('/admin/fetch-districts/') }}/' + province_id,
                    type: 'post',
                    dataType: "json",
                    success: function(response) {
                        //console.log(response['districts'].length);

                        //console.log(response['districts'].length);
                        $('#selectDistricts').find('option:not(:first)').remove();
                        $('#selectWards').find('option:not(:first)').remove();

                        if (response['districts'].length > 0) {
                            $.each(response['districts'], function(key, value) {
                                $("#selectDistricts").append("<option value='" + value[
                                    'id'] + "'>" + value['name'] + "</option>");
                            });
                        }
                    }
                });
            });

            $("#selectDistricts").change(function() {
                var district_id = $(this).val();
                if (district_id == "") {
                    var district_id = 0;
                }
                $.ajax({
                    url: '{{ url('/admin/fetch-wards/') }}/' + district_id,
                    type: 'post',
                    dataType: "json",
                    success: function(response) {
                        //console.log(response['districts'].length);

                        //console.log(response['districts'].length);
                        $('#selectWards').find('option:not(:first)').remove();
                        if (response['wards'].length > 0) {
                            $.each(response['wards'], function(key, value) {
                                $("#selectWards").append("<option value='" + value[
                                    'id'] + "'>" + value['name'] + "</option>");
                            });
                        }
                    }
                });
            });
            //set thời gian thông báo
            setTimeout(function() {
                $("#success-alert").alert('close'); // Đóng alert sau 2 giây
            }, 2000);
            setTimeout(function() {
                $("#stop-alert").alert('close'); // Đóng alert sau 2 giây
            }, 2000);

            //select subcategories from categories
            $("#selectCategories").change(function() {
                var category_id = $(this).val();
                if (category_id == "") {
                    var category_id = 0;
                }
                $.ajax({
                    url: '{{ url('/admin/fetch-subcategories/') }}/' + category_id,
                    type: 'post',
                    dataType: "json",
                    success: function(response) {
                        //console.log(response['districts'].length);

                        //console.log(response['districts'].length);
                        $('#selectSubCategories').find('option:not(:first)').remove();

                        if (response['subcategories'].length > 0) {
                            $.each(response['subcategories'], function(key, value) {
                                $("#selectSubCategories").append("<option value='" +
                                    value[
                                        'id'] + "'>" + value['name'] + "</option>");
                            });
                        }
                    }
                });
            });
        });
        CKEDITOR.replace('editor1', {
            height: 300 // Đặt chiều cao mong muốn ở đây (đơn vị px)
        });
        CKEDITOR.replace('editor2');
    </script>

</body>

</html>

@extends('admin.app')
@section('title', 'Admin - Báo cáo thống kê')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Quản lý tài khoản</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thêm tài khoản</li>
@endsection
@section('account-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Thêm tài khoản</h5>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nhập thông tin tài khoản</h6>
                </div>
                <div class="card-body">
                    <form>
                        {{-- <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh đại diện</label>

                                <div class="custom-file col-sm-8">
                                <input type="file" accept="image/*" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                </div>
                              
                          </div> --}}
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Họ</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Họ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tên</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Tên...">
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2">Giới tính</legend>
                                <span style="margin-right: 10px;"></span>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Nam</label>
                                </div>
                                <span style="margin-right: 10px;"></span>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Nữ</label>
                                </div>

                            </div>
                        </fieldset>
                        <div class="form-group row" id="simple-date3">
                            <label for="decadeView" class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="input-group date col-sm-8">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" value="01/06/2020" id="decadeView">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Số điện thoại...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Địa chỉ..."></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Chức vụ</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    {{-- set default value: selected="selected" --}}
                                    <option>----Chọn chức vụ----</option>
                                    <option>Admin</option>
                                    <option>Nhân viên</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection

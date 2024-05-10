@extends('admin.app')
@section('title', 'Admin - Thêm thành viên')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Quản lý thành viên</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thêm thành viên</li>
@endsection
@section('member-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Thêm thành viên</h5>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nhập thông tin thành viên</h6>
                </div>
                <div class="card-body">
                    <form>
                        @csrf
                        {{-- <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh đại diện</label>

                                <div class="custom-file col-sm-8">
                                <input type="file" accept="image/*" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                </div>
                              
                          </div> --}}
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Họ tên</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Họ tên...">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Số điện thoại...">
                            </div>
                        </div>
                        <div class="form-group row" id="simple-date3">
                            <label for="decadeView" class="col-sm-2 col-form-label">Ngày hết hạn</label>
                            <div class="input-group date col-sm-8">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" value="01/06/2020" id="decadeView">
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Địa chỉ..."></textarea>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Thêm thành viên</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection

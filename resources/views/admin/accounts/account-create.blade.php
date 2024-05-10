@extends('admin.app')
@section('title', 'Admin - Thêm tài khoản')
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
                    <form method="POST" action="{{ route('accounts.store') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh đại diện</label>

                                <div class="custom-file col-sm-8">
                                <input type="file" accept="image/*" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                </div>
                              
                          </div> --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Họ tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Họ tên...">
                                <div style="color: red">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}<br>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2">Giới tính</legend>
                                <span style="margin-right: 10px;"></span>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="gender" value="male" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Nam</label>
                                </div>
                                <span style="margin-right: 10px;"></span>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="gender" value="female" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Nữ</label><br>
                                </div>
                                <div style="color: red; margin-left: 20px;">
                                    @if ($errors->has('gender'))
                                        {{ $errors->first('gender') }}<br>
                                    @endif
                                </div>
                                
                            </div>
                            
                        </fieldset>
                        <div class="form-group row" id="simple-date3">
                            <label for="decadeView" class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="input-group date col-sm-8">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" value="01/01/2000" id="decadeView" name="birthday">
                                <br>
                                
                            </div>
                            <div style="color: red; margin-left: 18%">
                                @if ($errors->has('birthday'))
                                    {{ $errors->first('birthday') }}<br>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Số điện thoại...">
                                <div style="color: red;">
                                    @if ($errors->has('phone'))
                                        {{ $errors->first('phone') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                                <div style="color: red;">
                                    @if ($errors->has('email'))
                                        {{ $errors->first('email') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Mật khẩu">
                                <div style="color: red;">
                                    @if ($errors->has('password'))
                                        {{ $errors->first('password') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Tỉnh/thành phố</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="province_id" id="selectProvinces">
                                    {{-- set default value: selected="selected" --}}
                                    <option value="">----Chọn tỉnh/thành phố----</option>
                                    @if (!@empty($provinces))
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div style="color: red;">
                                    @if ($errors->has('province_id'))
                                        {{ $errors->first('province_id') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Quận/huyện</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="district_id" id="selectDistricts">
                                    {{-- set default value: selected="selected" --}}
                                    <option value="">----Chọn quận/huyện----</option>
                                </select>
                                <div style="color: red;">
                                    @if ($errors->has('district_id'))
                                        {{ $errors->first('district_id') }}<br>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Phường/xã</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="ward_id" id="selectWards">
                                    {{-- set default value: selected="selected" --}}
                                    <option value="">----Chọn phường/xã----</option>
                                </select>
                                <div style="color: red;">
                                    @if ($errors->has('ward_id'))
                                        {{ $errors->first('ward_id') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="5" placeholder="Địa chỉ..."></textarea>
                            </div>
                            <div style="color: red; margin-left: 18%;">
                                @if ($errors->has('address'))
                                    {{ $errors->first('address') }}<br>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Chức vụ</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="role" id="exampleFormControlSelect1">
                                    {{-- set default value: selected="selected" --}}
                                    <option value="">----Chọn chức vụ----</option>
                                    <option value="1">Admin</option>
                                    <option value="0">Nhân viên</option>
                                    <option value="2">Khách hàng</option>
                                </select>
                                <div style="color: red;">
                                    @if ($errors->has('role'))
                                        {{ $errors->first('role') }}<br>
                                    @endif
                                </div>
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
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            //select districts from provinces
            $("#selectProvinces").change(function() {
                var province_id = $(this).val();
                $.ajax({
                    url: '{{ url('/admin/fetch-districts/') }}/' + province_id,
                    type: 'post',
                    dataType: "json",
                    success: function(response) {
                        //console.log(response['districts'].length);
                        $('#selectDistricts').find('option:not(:first)').remove();
                        if (response['districts'].lenght > 0) {
                            $.each(response['districts'], function(key, value) {
                                $("#selectDistricts").append("<option id='" + value[
                                    'id'] + "'>" + value['name'] + "</option>");
                            });
                        }
                    }
                });
            })

        });
    </script> --}}
@endsection

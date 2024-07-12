@php
    use Carbon\Carbon;
@endphp
@extends('admin.app')
@section('title', 'Admin - Thông tin tài khoản')
@section('header-route')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
@endsection
@section('content-pages')
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
    <div class="row">
        <div class="col-lg-9">
            <div class="card mb-4" style="margin-left: 25%">

                <div class="card-body">
                    <h4 style="text-align: center;"><b>Thông tin tài khoản đăng nhập</b></h4>
                    <hr>
                    <form method="POST" action="{{ route('updateAdminProfile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="main-img" style="align-items: center; display:flex; justify-content: center;">
                            @auth
                                @if (Auth::user()->avatar)
                                    {{-- dd({{Auth::user()->avatar}}) --}}
                                    <img style="margin: 0px 20%; width: 20%; height: auto; object-fit: contain; border-radius: 30px"
                                        src="{{ asset('storage/' . $user->avatar) }}" id="preview">
                                @elseif ($user->avatar)
                                    <img style="margin: 0px 20%; width: 20%; height: auto; object-fit: contain; border-radius: 30px"
                                        src="{{ $user->avatar }}" id="preview">
                                @else
                                    <img style="margin: 0px 20%; width: 20%; height: auto; object-fit: contain; border-radius: 30px"
                                        src="{{ asset('../image/user_default.png') }}" id="preview">
                                @endif
                            @endauth

                            <input type="file" accept="image/*" name="avatar" id="avatar" class="upload-input"
                                onchange="previewImage()" style="display: none;" />
                        </div>
                        <a class="btn btn-primary" onclick="document.getElementById('avatar').click()"
                            style="margin-left: 43%; margin-bottom: 5px; color: white;">
                            <i class="fa fa-pencil-alt"></i>
                            <span class="text">Chọn ảnh</span>
                        </a>
                        <div class="form-group">
                            <h6><strong>Tên đăng nhập: </strong></h6>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $user->name) }}">
                            <div style="color: red">
                                @if ($errors->has('name'))
                                    {{ $errors->first('name') }}<br>
                                @endif
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <h6 style="margin-left: 15px;"><strong>Giới tính: </strong></h6>
                                <span style="margin-right: 10px;"></span>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="gender" value="male"
                                        class="custom-control-input"
                                        {{ old('gender', $user->gender) == 'male' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customRadio1">Nam</label>
                                </div>
                                <span style="margin-right: 10px;"></span>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="gender" value="female"
                                        class="custom-control-input"
                                        {{ old('gender', $user->gender) == 'female' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customRadio2">Nữ</label><br>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group" id="simple-date3">
                            <h6><strong>Ngày sinh: </strong></h6>
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control"
                                    value="{{ old('birthday', Carbon::parse($user->birthday)->format('d/m/Y')) }}"
                                    id="decadeView" name="birthday">
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <h6><strong>Số điện thoại: </strong></h6>
                            <input type="number" class="form-control" id="phone" name="phone"
                                value="{{ $user->phone }}">
                        </div>
                        <div class="row">

                            <div class="form-group" style="margin-left: 10px;">
                                <h6><strong>Tỉnh/thành phố</strong></h6>
                                <div class="col-sm-20">
                                    <select class="form-control" name="province_id" id="selectProvinces">
                                        <option value="">----Chọn tỉnh/thành phố----</option>
                                        @if (!@empty($provinces))
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}"
                                                    {{ old('province_id', $user->province_id) == $province->id ? 'selected' : '' }}>
                                                    {{ $province->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="margin-left: 20px;">
                                <h6><strong>Quận/huyện</strong></h6>
                                <div class="col-sm-20">
                                    <select class="form-control" name="district_id" id="selectDistricts">
                                        <option value="">----Chọn quận/huyện----</option>
                                        @if (!@empty($districts))
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"
                                                    {{ old('district_id', $user->district_id) == $district->id ? 'selected' : '' }}>
                                                    {{ $district->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="margin-left: 20px;">
                                <h6><strong>Phường/xã</strong></h6>
                                <div class="col-sm-20">
                                    <select class="form-control" name="ward_id" id="selectWards">
                                        <option value="">----Chọn phường/xã----</option>
                                        @if (!@empty($wards))
                                            @foreach ($wards as $ward)
                                                <option value="{{ $ward->id }}"
                                                    {{ old('ward_id', $user->ward_id) == $ward->id ? 'selected' : '' }}>
                                                    {{ $ward->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h6><strong>Địa chỉ</strong></h6>
                            <div class="col-sm-20">
                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="5"
                                    placeholder="Địa chỉ...">{{ old('address', $user->address) }}</textarea>
                            </div>
                        </div>
                        <h5><strong>Chức vụ: </strong>
                            @if ($user->role == 1)
                                Admin
                            @elseif ($user->role == 0)
                                Nhân viên
                            @endif
                        </h5> 
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            const preview = document.getElementById('preview');
            const fileInput = document.getElementById('avatar');
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
@endsection

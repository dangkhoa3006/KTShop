@php
    use Carbon\Carbon;
@endphp
@extends('admin.app')
@section('title', 'Admin - Thông tin thành viên')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Quản lý thành viên</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thông tin thành viên</li>
@endsection
@section('member-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Cập nhật tài khoản</h5>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nhập thông tin tài khoản</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('members.update', ['member' => $member]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Ảnh đại diện</label>
                            <div class="frame">
                                <div class="center">
                                    <div class=" dropzone">
                                        <img id="preview" src="{{ $member->user->avatar }}" class="upload-icon" />
                                        <input type="file" accept="image/*" name="avatar" id="avatar"
                                            class="upload-input" onchange="previewImage()" />

                                    </div>
                                    <div style="color: red">
                                        @if ($errors->has('avatar'))
                                            {{ $errors->first('avatar') }}<br>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div><br>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Họ tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $member->user->name) }}" placeholder="Họ tên...">
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
                                    <input type="radio" id="customRadio1" name="gender" value="male"
                                        class="custom-control-input"
                                        {{ old('gender', $member->user->gender) == 'male' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customRadio1">Nam</label>
                                </div>
                                <span style="margin-right: 10px;"></span>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="gender" value="female"
                                        class="custom-control-input"
                                        {{ old('gender', $member->user->gender) == 'female' ? 'checked' : '' }}>
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
                                <input type="text" class="form-control"
                                    value="{{ old('birthday', Carbon::parse($member->user->birthday)->format('d/m/Y')) }}"
                                    id="decadeView" name="birthday">
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
                                <input type="number" class="form-control" name="phone" id="phone"
                                    value="{{ old('phone', $member->user->phone) }}">
                                <div style="color: red;">
                                    @if ($errors->has('phone'))
                                        {{ $errors->first('phone') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Tỉnh/thành phố</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="province_id" id="selectProvinces">
                                    <option value="">----Chọn tỉnh/thành phố----</option>
                                    @if (!@empty($provinces))
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}"
                                                {{ old('province_id', $member->user->province_id) == $province->id ? 'selected' : '' }}>
                                                {{ $province->name }}</option>
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
                                    <option value="">----Chọn quận/huyện----</option>
                                    @if (!@empty($districts))
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"
                                                {{ old('district_id', $member->user->district_id) == $district->id ? 'selected' : '' }}>
                                                {{ $district->name }}
                                            </option>
                                        @endforeach
                                    @endif
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
                                    <option value="">----Chọn phường/xã----</option>
                                    @if (!@empty($wards))
                                        @foreach ($wards as $ward)
                                            <option value="{{ $ward->id }}"
                                                {{ old('ward_id', $member->user->ward_id) == $ward->id ? 'selected' : '' }}>
                                                {{ $ward->name }}
                                            </option>
                                        @endforeach

                                    @endif
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
                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="5"
                                    placeholder="Địa chỉ...">{{ old('address', $member->user->address) }}</textarea>
                            </div>
                            <div style="color: red; margin-left: 18%;">
                                @if ($errors->has('address'))
                                    {{ $errors->first('address') }}<br>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                    <option value="">----Trạng thái----</option>
                                    <option value="1" {{ old('status', $member->user->status) == 1 ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="0" {{ old('status', $member->user->status) == 0 ? 'selected' : '' }}>Không hoạt động</option>
                                </select>
                                <div style="color: red;">
                                    @if ($errors->has('status'))
                                        {{ $errors->first('status') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
                                <button type="button" id="cancelBtn" class="btn btn-danger">Hủy</button>
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
        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.getElementById('myForm').reset(); // Reset form khi nhấn "Hủy"
        });
    </script>
@endsection

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
    <h5 class="h4 mb-2 text-gray-800">Chi tiết tài khoản</h5>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="avatar" style="display: block;  margin-left: auto;  margin-right: auto;text-align: center;">
                        <img src="{{ $member->user->avatar }}" class="img-thumbnail" width="150">
                    </div><br>
                    <h4 style="text-align: center;"><b>{{ $member->user->name }}</b></h4>
                    <p><b>Email: </b> {{ $member->user->email }}</p>
                    <p><b>Số điện thoại: </b>
                        @if ($member->user->phone == null)
                            *Chưa cập nhật*
                        @endif
                        {{ $member->user->phone }}
                    </p>
                    <p><b>Giới tính: </b>
                        @if ($member->user->gender == 'male')
                            Nam
                        @elseif ($member->user->gender == 'female')
                            Nữ
                        @elseif ($member->user->gender == null)
                            *Chưa cập nhật*
                        @endif
                    </p>
                    <p><b>Ngày sinh: </b>
                        @if ($member->user->birthday == null)
                            *Chưa cập nhật*
                        @else
                            {{ Carbon::parse($member->user->birthday)->format('d/m/Y') }}
                        @endif
                    </p>
                    <p><b>Địa chỉ: </b>
                        {{-- {{ $member->address . ', ' . $user->ward_name . ', ' . $user->district_name . ', tỉnh' . $user->province_name }}.</p> --}}
                        {{-- Nếu 1 trong các trường bị NULL thì sẽ không in ra --}}
                        @if (empty($member->user->address) && empty($user->ward_name) && empty($user->district_name) && empty($user->province_name))
                            *Chưa cập nhật*
                        @else
                            @isset($member->user->address)
                                {{ $member->user->address }},
                            @endisset
                            @isset($user->ward_name)
                                {{ $user->ward_name }},
                            @endisset
                            @isset($user->district_name)
                                {{ $user->district_name }},
                            @endisset
                            @isset($user->province_name)
                                tỉnh {{ $user->province_name }}.
                            @endisset
                        @endif
                    </p>
                    <p><b>Chức vụ: </b>
                        @if ($member->user->role == 2)
                            Thành viên
                        @endif
                    </p>
                    <a href="{{route('members.edit', $member)}}" class="btn btn-success btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Cập nhật tài khoản</span>
                    </a>
                </div>

            </div>
        </div>

    </div>
@endsection

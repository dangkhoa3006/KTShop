@extends('clients.app-client')
@section('title', 'KTMobile.vn - Tra cứu đơn hàng')
@section('client-content-pages')
    <div class="container">
        <div class="payment" style="display:flex; justify-content: center">
            <div class="col-lg-7 col-md-6 col-12">
                <div class="card" style="margin-top: 50px; margin-bottom: 200px;">
                    <div class="user-info" style="margin: 20px 20px;">
                        <h5 style="margin-bottom: 5px; text-align: center">Kiểm tra thông tin đơn hàng & tình trạng vận chuyển</h5>
                        <form method="POST" action="{{route('checkOrder')}}">
                            @csrf
                            <div style="margin-top: 10px; color: #333;">
                                <b for="name" class="col-sm-1 col-form-label">Mã đơn hàng</b>
                                <div class="col-sm-15">
                                    <input type="text" class="form-control" id="code"
                                        name="code" value="{{ old('code') }}"
                                        placeholder="Mã đơn hàng...">
                                    <div style="color: red">
                                        @if ($errors->has('code'))
                                            {{ $errors->first('code') }}<br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 10px;margin-bottom: 40px; color: #333;">
                                <b for="phone" class="col-sm-1 col-form-label">Số điện thoại</b>
                                <div class="col-sm-15">
                                    <input type="text" class="form-control" id="phone"
                                        name="phone" value="{{ old('phone') }}"
                                        placeholder="Số điện thoại...">
                                    <div style="color: red">
                                        @if ($errors->has('phone'))
                                            {{ $errors->first('phone') }}<br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="btn_check_order"
                                    style="margin-bottom: 10px;width: 100%;"><b>KIỂM TRA</b></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

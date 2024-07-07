@extends('admin.app')
@section('title', 'Admin - Quản lý đánh giá')
@section('header-route')
    @parent <li class="breadcrumb-item active" aria-current="page">Quản lý đánh giá</li>
@endsection
@section('review-active', 'active')
@section('content-pages')
    <style>
        .rate {
            border-bottom-right-radius: 12px;
            border-bottom-left-radius: 12px
        }

        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 1em;
            font-size: 30px;
            font-weight: 300;
            color: #FFD600;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }

        .buttons {
            top: 10px;
            position: relative
        }

        .rating-submit {
            border-radius: 8px;
            color: #fff;
            height: auto
        }

        .rating-submit:hover {
            color: #fff
        }
    </style>
    <!--Xuất thông báo sau khi tạo tài khoản-->
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

    <h5 class="h4 mb-2 text-gray-800">Danh sách đánh giá khách hàng</h5>

    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Nội dung</th>
                                <th style="text-align: center">Đánh giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($review as $rev)
                                <tr>
                                    <td>#{{ $rev->order->code }}</td>
                                    <td>{{ $rev->username }}</td>
                                    <td>{{ $rev->phone }}</td>
                                    <td>{{ $rev->content }}</td>
                                    <td>
                                        <div class="rating">
                                            @for ($i = 5; $i >= 1; $i--)
                                                <input type="radio" name="rating{{ $rev->id }}" value="{{ $i }}" id="rating{{ $rev->id }}_{{ $i }}"
                                                       {{ $i == $rev->rating ? 'checked' : '' }} disabled>
                                                <label for="rating{{ $rev->id }}_{{ $i }}">☆</label>
                                            @endfor
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

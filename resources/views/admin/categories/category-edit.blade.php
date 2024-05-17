@extends('admin.app')
@section('title', 'Admin - Cập nhật danh mục sản phẩm')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Quản lý danh mục sản phẩm</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cập nhật danh mục</li>
@endsection
@section('category-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Cập nhật danh mục</h5>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nhập danh mục</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update',['category'=>$cate]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tên danh mục</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $cate->name) }}" placeholder="Tên danh mục...">
                                <div style="color: red">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                    <option value="">----Trạng thái----</option>
                                    <option value="1" {{ old('status', $cate->status) == 1 ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="0" {{ old('status', $cate->status) == 0 ? 'selected' : '' }}>Không hoạt động</option>
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
                                <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.app')
@section('title', 'Admin - Cập nhật loại sản phẩm')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('subcategories.index') }}">Quản lý loại sản phẩm</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cập nhật loại sản phẩm</li>
@endsection
@section('subcategory-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Cập nhật loại sản phẩm</h5>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Nhập loại sản phẩm</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('subcategories.update',['subcategory'=>$subcate])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tên loại sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $subcate->name) }}" placeholder="Tên loại...">
                                <div style="color: red">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Danh mục</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                    <option value="">----Danh mục sản phẩm----</option>
                                    @foreach ($list as $cate)
                                        <option value="{{ $cate->id }}"
                                            @if ($cate->id == old('category_id', $subcate->category_id)) selected @endif>{{ $cate->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div style="color: red;">
                                    @if ($errors->has('category_id'))
                                        {{ $errors->first('category_id') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                    <option value="">----Trạng thái----</option>
                                    <option value="1" {{ old('status', $subcate->status) == 1 ? 'selected' : '' }}>Hoạt động</option>
                                    <option value="0" {{ old('status', $subcate->status) == 0 ? 'selected' : '' }}>Không hoạt động</option>
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
                                <button type="submit" class="btn btn-primary">Cập nhật loại sản phẩm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.app')
@section('title', 'Admin - Cập nhật sản phẩm')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Quản lý sản phẩm</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cập nhật sản phẩm</li>
@endsection
@section('product-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Cập nhật sản phẩm</h5>
    <form method="POST" action="{{ route('products.update', ['product' => $p]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group-pd">
                            <label for="name" class="col-sm-5 col-form-label">Ảnh sản phẩm</label>
                            <div class="frame-pd">
                                <div class="center-pd">
                                    <div class="dropzone-product">
                                        <img id="preview"
                                            src="{{ $p->image ? $p->image : asset('/image/no-pictures.png') }}"
                                            class="upload-icon-product" />
                                        <input type="file" accept="image/*" name="image" id="image"
                                            class="upload-input-product" onchange="previewImage()" />
                                    </div>
                                    <div style="color: red">
                                        @if ($errors->has('image'))
                                            {{ $errors->first('image') }}<br>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group-pd row-pd">
                            <div class="container" style="height:360px">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="upload-img">Ảnh chi tiết sản phẩm</label>
                                            <input type="file" class="form-control" name="images[]" multiple
                                                id="upload-img" />
                                        </div>
                                        <div class="img-thumbs img-thumbs-hidden" id="img-preview">
                                            @foreach ($p->images as $detailImage)
                                                <div class="wrapper-thumb">
                                                    <img src="{{ asset('storage/' . $detailImage->image_path) }}"
                                                        class="img-preview-thumb">
                                                    <span class="remove-btn" onclick="removeImage(this)">x</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Nhập thông tin sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $p->name) }}" placeholder="Tên sản phẩm...">
                                <div style="color: red">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="touchSpin1" class="col-sm-2 col-form-label">Số lượng</label>
                            <div class="col-sm-8">
                                <input id="touchSpin1" type="text" name="quantity"
                                    value="{{ old('quantity', $p->quantity) }}" class="form-control">
                                <div style="color: red">
                                    @if ($errors->has('quantity'))
                                        {{ $errors->first('quantity') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="touchSpin3" class="col-sm-2 col-form-label">Giá bán</label>
                            <div class="col-sm-10">
                                <input id="touchSpin3" type="number" name="price" value="{{ old('price', $p->price) }}"
                                    class="form-control" max="100000000">
                                <div style="color: red">
                                    @if ($errors->has('price'))
                                        {{ $errors->first('price') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="touchSpin3" class="col-sm-2 col-form-label">Giá khuyến mãi</label>
                            <div class="col-sm-8">
                                <input id="touchSpin3" type="number" name="sale_price"
                                    value="{{ old('sale_price', $p->sale_price) }}" class="form-control" max="100000000">
                                <div style="color: red">
                                    @if ($errors->has('sale_price'))
                                        {{ $errors->first('sale_price') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Danh mục</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id" id="selectCategories">
                                    <option value="">----Danh mục sản phẩm----</option>
                                    @if (!@empty($listCategory))
                                        @foreach ($listCategory as $cate)
                                            <option value="{{ $cate->id }}"
                                                {{ old('category_id', $p->category_id) == $cate->id ? 'selected' : '' }}>
                                                {{ $cate->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <div style="color: red;">
                                    @if ($errors->has('category_id'))
                                        {{ $errors->first('category_id') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Loại sản phẩm</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="subcategory_id" id="selectSubCategories">
                                    <option value="">----Loại sản phẩm----</option>
                                    @foreach ($listSubcategory as $subcate)
                                        <option value="{{ $subcate->id }}"
                                            {{ old('subcategory_id', $p->subcategory_id) == $subcate->id ? 'selected' : '' }}>
                                            {{ $subcate->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div style="color: red;">
                                    @if ($errors->has('subcategory_id'))
                                        {{ $errors->first('subcategory_id') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Mô tả sản
                                phẩm</label>
                            <div class="col-sm-10">
                                <textarea id="editor1" name="description">{{ old('description', $p->description) }}</textarea>
                            </div>
                            <div style="color: red; margin-left: 18%;">
                                @if ($errors->has('description'))
                                    {{ $errors->first('description') }}<br>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Tình trạng</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                    <option value="">----Tình trạng----</option>
                                    <option value="1" {{ old('status', $p->status) == 1 ? 'selected' : '' }}>Còn hàng
                                    </option>
                                    <option value="0" {{ old('status', $p->status) == 0 ? 'selected' : '' }}>Hết hàng
                                    </option>
                                </select>
                                <div style="color: red;">
                                    @if ($errors->has('status'))
                                        {{ $errors->first('status') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body" style="height: 50em; max-height: 54em; overflow-y: auto;">
                        <div class="card-header py-1 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Cấu hình sản phẩm</h6>
                        </div>
                        <div id="specifications-wrapper">
                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" id="add-specification" class="btn btn-primary">Thêm thông số</button>
                            </div>
                            <br>
                            @foreach ($specifications as $index => $specification)
                                <div class="specification-item">
                                    <div class="form-group row">
                                        <label for="specifications[{{ $index }}][title]" class="col-sm-2 col-form-label">Tiêu đề</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="specifications[{{ $index }}][title]" class="form-control" value="{{ $specification->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="specifications[{{ $index }}][content]" class="col-sm-2 col-form-label">Nội dung</label>
                                        <div class="col-sm-10">
                                            <textarea name="specifications[{{ $index }}][content]" class="form-control">{{ $specification->content }}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-danger remove-specification">Xóa</button>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-header py-1 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Thuộc tính sản phẩm</h6>
                        </div>
                        <div class="panel-group" id="attributes-wrapper">
                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" id="add-attribute" class="btn btn-primary">Thêm thuộc tính</button>
                            </div>
                            <br>
                            @foreach ($attributes as $index => $attribute)
                                <div class="panel panel-default attribute-item" style="border: 2px solid #0098ac; border-radius: 10px;margin-bottom: 20px;">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#collapse{{ $index }}" style="margin-left: 5px;">
                                                <i class="fa fa-plus-circle" style="margin-top: 10px;"> Chi tiết sản phẩm</i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{ $index }}" class="panel-collapse collapse" style="margin: 0 5%;">
                                        <div class="panel-body">
                                            <input type="hidden" name="attributes[{{ $index }}][current_image]" value="{{ $attribute->attribute_image }}">
                                            <div class="form-group">
                                                <label for="attributes[{{ $index }}][attribute_image]" class="col-sm-2 col-form-label">Hình ảnh sản phẩm</label>
                                                <div class="col-sm-10">
                                                    <div class="frame-pd">
                                                        <div class="center-pd">
                                                            <div class="dropzone-product">
                                                                <img id="attribute-preview-{{ $index }}" src="{{ asset('storage/' . $attribute->attribute_image) }}" class="upload-icon-product">
                                                                <input type="file" accept="image/*" name="attributes[{{ $index }}][attribute_image]" id="attribute-image-{{ $index }}" class="upload-input-product" onchange="previewImage(event, {{ $index }})">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attributes[{{ $index }}][color]" class="col-sm-2 col-form-label">Màu sắc</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="attributes[{{ $index }}][color]" class="form-control" value="{{ $attribute->color }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attributes[{{ $index }}][quantity]" class="col-sm-2 col-form-label">Số lượng</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="attributes[{{ $index }}][quantity]" class="form-control" value="{{ $attribute->quantity }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attributes[{{ $index }}][sale_price]" class="col-sm-2 col-form-label">Giá khuyến mãi</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="attributes[{{ $index }}][sale_price]" class="form-control" value="{{ $attribute->sale_price }}">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-danger remove-attribute">Xóa thuộc tính</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            </div>
        </div>
    </form>

    <script>
        function previewImage() {
            var file = document.getElementById('image').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                document.getElementById('preview').src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                document.getElementById('preview').src = "../../image/image_gallery.png";
            }
        };

        //Cập nhật thông số kỹ thuật
        document.addEventListener('DOMContentLoaded', function() {
            let specIndex = {{ count($p->specifications) }};

            document.getElementById('add-specification').addEventListener('click', function() {
                addSpecification(specIndex);
                specIndex++;
            });

            document.getElementById('specifications-wrapper').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-specification')) {
                    e.target.closest('.specification-item').remove();
                }
            });
        });

        function addSpecification(index) {
            const specWrapper = document.getElementById('specifications-wrapper');
            const specItem = document.createElement('div');
            specItem.classList.add('specification-item');
            specItem.innerHTML = `
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Tiêu đề</label>
            <div class="col-sm-10">
                <input type="text" name="specifications[${index}][title]" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Nội dung</label>
            <div class="col-sm-10">
                <textarea name="specifications[${index}][content]" class="form-control"></textarea>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-danger remove-specification">Xóa</button>
        </div>
        <hr>
    `;
            specWrapper.appendChild(specItem);
        }

        // Thêm thuộc tính mới
    document.getElementById('add-attribute').addEventListener('click', function () {
        var index = document.querySelectorAll('.attribute-item').length;
        var wrapper = document.getElementById('attributes-wrapper');
        var attributeHTML = `
        <div class="panel panel-default attribute-item" style="border: 2px solid #0098ac; border-radius: 10px; margin-bottom: 20px;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse${index}" style="margin-left: 5px;">
                        <i class="fa fa-plus-circle" style="margin-top: 10px;"> Chi tiết sản phẩm</i>
                    </a>
                </h4>
            </div>
            <div id="collapse${index}" class="panel-collapse collapse" style="margin: 0 5%;">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="attributes[${index}][attribute_image]" class="col-sm-2 col-form-label">Hình ảnh sản phẩm</label>
                    <div class="col-sm-10">
                        <div class="frame-pd">
                            <div class="center-pd">
                                <div class="dropzone-product">
                                    <img id="attribute-preview-${index}" src="{{ asset('/image/no-pictures.png') }}" class="upload-icon-product" />
                                    <input type="file" accept="image/*" name="attributes[${index}][attribute_image]" id="attribute-image-${index}" class="upload-input-product" onchange="previewImage(event, ${index})" />
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="attributes[${index}][color]" class="col-sm-2 col-form-label">Màu sắc</label>
                        <div class="col-sm-10">
                            <input type="text" name="attributes[${index}][color]" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="attributes[${index}][quantity]" class="col-sm-2 col-form-label">Số lượng</label>
                        <div class="col-sm-10">
                            <input type="number" name="attributes[${index}][quantity]" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="attributes[${index}][sale_price]" class="col-sm-2 col-form-label">Giá khuyến mãi</label>
                        <div class="col-sm-10">
                            <input type="number" name="attributes[${index}][sale_price]" class="form-control" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger remove-attribute">Xóa thuộc tính</button>
            </div>
        </div>
    `;
        wrapper.insertAdjacentHTML('beforeend', attributeHTML);
    });

    // Xóa thuộc tính
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-attribute')) {
            event.target.closest('.attribute-item').remove();
        }
    });
    // Hàm xem trước hình ảnh
    function previewImage(event, index) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var imgElement = document.getElementById('attribute-preview-' + index);
            imgElement.src = reader.result;
        };
        reader.readAsDataURL(input.files[0]);
    }

        //Cập nhật danh sách ảnh sản phẩm
        var imgUpload = document.getElementById('upload-img'),
            imgPreview = document.getElementById('img-preview'),
            totalFiles = [],
            wrapper,
            removeBtn,
            img;

        imgUpload.addEventListener('change', previewImgs, true);

        function previewImgs(event) {
            var files = event.target.files;

            for (var i = 0; i < files.length; i++) {
                compressAndPreview(files[i]);
            }
        }

        function compressAndPreview(file) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(event) {
                const imgElement = document.createElement("img");
                imgElement.src = event.target.result;
                imgElement.onload = function(e) {
                    const canvas = document.createElement("canvas");
                    const MAX_WIDTH = 200;
                    const scaleSize = MAX_WIDTH / e.target.width;
                    canvas.width = MAX_WIDTH;
                    canvas.height = e.target.height * scaleSize;
                    const ctx = canvas.getContext("2d");
                    ctx.drawImage(e.target, 0, 0, canvas.width, canvas.height);
                    const srcEncoded = ctx.canvas.toDataURL(e.target, "image/jpeg");

                    // Display the compressed image
                    wrapper = document.createElement('div');
                    wrapper.classList.add('wrapper-thumb');
                    removeBtn = document.createElement('span');
                    nodeRemove = document.createTextNode('x');
                    removeBtn.classList.add('remove-btn');
                    removeBtn.appendChild(nodeRemove);
                    img = document.createElement('img');
                    img.src = srcEncoded;
                    img.classList.add('img-preview-thumb');
                    wrapper.appendChild(img);
                    wrapper.appendChild(removeBtn);
                    imgPreview.appendChild(wrapper);

                    // Add file to totalFiles array
                    totalFiles.push(file);

                    // Update input files
                    updateInputFiles();

                    removeBtn.addEventListener('click', function() {
                        // Remove file from totalFiles array
                        var index = totalFiles.indexOf(file);
                        if (index > -1) {
                            totalFiles.splice(index, 1);
                        }

                        // Remove the image preview
                        this.parentNode.remove();

                        // Update input files
                        updateInputFiles();
                    });
                };
            };
        }

        function updateInputFiles() {
            var dataTransfer = new DataTransfer();
            totalFiles.forEach(function(file) {
                dataTransfer.items.add(file);
            });
            imgUpload.files = dataTransfer.files;

            // Show or hide imgPreview based on the number of files
            if (totalFiles.length > 0) {
                imgPreview.classList.remove('img-thumbs-hidden');
            } else {
                imgPreview.classList.add('img-thumbs-hidden');
            }
        }

        function removeImage(element) {
            element.parentNode.remove();
        }
    </script>
    <style>
        .img-thumbs {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            max-height: 270px;
            overflow-y: auto;
        }

        .wrapper-thumb {
            position: relative;
            width: 200px;
            height: auto;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .img-preview-thumb {
            max-width: 100%;
            max-height: 100%;
        }

        .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #555555;
        }
    </style>
@endsection

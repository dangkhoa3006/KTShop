@extends('admin.app')
@section('title', 'Admin - Thêm sản phẩm')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Quản lý sản phẩm</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
@endsection
@section('product-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Thêm sản phẩm</h5>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group-pd">
                            <label for="name" class="col-sm-5 col-form-label">Ảnh đại diện sản phẩm</label>
                            <div class="frame-pd">
                                <div class="center-pd">
                                    <div class="dropzone-product">
                                        <img id="preview" src="../../image/no_image.png" class="upload-icon-product" />
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
                                    value="{{ old('name') }}" placeholder="Tên sản phẩm...">
                                <div style="color: red">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="touchSpin1" class="col-sm-2 col-form-label">Số lượng</label>
                            <div class="col-sm-10">
                                <input id="touchSpin1" type="text" name="quantity" class="form-control">
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
                                <input id="touchSpin3" type="number" name="price" class="form-control" max="100000000">
                                <div style="color: red">
                                    @if ($errors->has('price'))
                                        {{ $errors->first('price') }}<br>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="touchSpin3" class="col-sm-2 col-form-label">Giá khuyến mãi</label>
                            <div class="col-sm-10">
                                <input id="touchSpin3" type="number" name="sale_price" class="form-control"
                                    max="100000000">
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
                                                @if ($cate->id == old('category_id')) selected @endif>{{ $cate->name }}
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
                                <textarea id="editor1" name="description"></textarea>
                            </div>
                            <div style="color: red; margin-left: 18%;">
                                @if ($errors->has('description'))
                                    {{ $errors->first('description') }}<br>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body" style="height: 47em; max-height: 54em; overflow-y: auto;">
                        <div class="card-header py-1 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Cấu hình sản phẩm</h6>
                        </div>
                        <div id="specifications-wrapper">
                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" id="add-specification" class="btn btn-primary">Thêm
                                    thông
                                    số</button>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Tiêu đề</label>
                                <div class="col-sm-10">
                                    <input type="text" name="specifications[0][title]" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label">Nội dung</label>
                                <div class="col-sm-10">
                                    <textarea name="specifications[0][content]" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger remove-specification">Xóa</button>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Thuộc tính sản phẩm --}}
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-header py-1 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Thuộc tính sản phẩm</h6>
                        </div>
                        <div class="panel-group" id="attributes-wrapper">
                            <div class="d-flex justify-content-end mt-3">
                                <button type="button" id="add-attributes" class="btn btn-primary">Thêm thuộc
                                    tính</button>
                            </div>
                            <br>
                            <div class="panel panel-default"
                                style="border: 2px solid #0098ac; border-radius: 10px;margin-bottom: 20px;">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapse0" style="margin-left: 5px;"><i
                                                class="fa fa-plus-circle" style="margin-top: 10px;"> Chi tiết sản phẩm
                                            </i></a>
                                    </h4>
                                </div>
                                <div id="collapse0" class="panel-collapse collapse" style="margin: 0 5%;">
                                    <div class="form-group-pd">
                                        <label for="name" class="col-sm-5 col-form-label">Ảnh sản phẩm</label>
                                        <div class="frame-pd" style="width: 40%; margin-left: 30%; margin-bottom: 20px;">
                                            <div class="center-pd">
                                                <div class="dropzone-product">
                                                    <img id="previewAttr0" src="{{ asset('../../image/no_image.png') }}"
                                                        class="upload-icon-product" />
                                                    <input type="file" accept="image/*"
                                                        name="attributes[0][attribute_image]" id="imageAttr0"
                                                        class="upload-input-product"
                                                        onchange="previewImageAttribute(0)" />
                                                </div>
                                                <div style="color: red">
                                                    @error('attributes.0.attribute_image')
                                                        {{ $message }}<br>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="color" class="col-sm-2 col-form-label">Màu sắc</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="color"
                                                name="attributes[0][color]" value="{{ old('attributes.0.color') }}"
                                                placeholder="Màu sắc...">
                                            <div style="color: red">
                                                @error('attributes.0.color')
                                                    {{ $message }}<br>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quantity" class="col-sm-2 col-form-label">Số lượng</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="attributes[0][quantity]"
                                                class="form-control" value="{{ old('attributes.0.quantity') }}" min="1" max="100">
                                            <div style="color: red">
                                                @error('attributes.0.quantity')
                                                    {{ $message }}<br>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sale_price" class="col-sm-2 col-form-label">Giá bán</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="attributes[0][sale_price]" class="form-control"
                                                max="100000000" value="{{ old('attributes.0.sale_price') }}">
                                            <div style="color: red">
                                                @error('attributes.0.sale_price')
                                                    {{ $message }}<br>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-danger remove-attribute">Xóa thuộc tính</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-15">
                    <button type="submit" style="margin-left: 20px; height: 50px" class="btn btn-primary">Thêm sản
                        phẩm</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        //Image product
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
        }
        
        //Cấu hình sản phẩm
        document.addEventListener('DOMContentLoaded', function() {
            let specificationIndex = 1;

            document.getElementById('add-specification').addEventListener('click', function() {
                const wrapper = document.getElementById('specifications-wrapper');
                const newSpec = document.createElement('div');
                newSpec.classList.add('form-group', 'specification-item');

                newSpec.innerHTML = `
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Tiêu đề</label>
                <div class="col-sm-10">
                    <input type="text" name="specifications[${specificationIndex}][title]" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Nội dung</label>
                <div class="col-sm-10">
                    <textarea name="specifications[${specificationIndex}][content]" class="form-control"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger remove-specification">Xóa</button>
            </div>
            <hr>
        `;
                wrapper.appendChild(newSpec);
                specificationIndex++;
            });
            document.getElementById('specifications-wrapper').addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-specification')) {
                    e.target.closest('.specification-item').remove();
                }
            });

        });

        //Image attribute
        // Image preview function
        function previewImageAttribute(index) {
            var file = document.getElementById("imageAttr" + index).files;
            if (file.length > 0) {
                var fileReader = new FileReader();
                fileReader.onload = function(event) {
                    document.getElementById("previewAttr" + index).setAttribute("src", event.target.result);
                };
                fileReader.readAsDataURL(file[0]);
            }
        }

        // Add attribute panel function
        let attrIndex = 1;
        document.getElementById('add-attributes').addEventListener('click', function() {
            let attrWrapper = document.getElementById('attributes-wrapper');
            // let newAttrIndex = removedIndices.length > 0 ? removedIndices.shift() : attrIndex++;
            let newAttr = document.createElement('div');
            newAttr.className = 'panel panel-default';
            newAttr.style.border = '2px solid #0098ac';
            newAttr.style.marginBottom = '20px';
            newAttr.style.borderRadius = '10px';
            newAttr.innerHTML = `
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse${attrIndex}" style="margin-left: 5px;"><i class="fa fa-plus-circle" style="margin-top: 10px;"> Chi tiết sản phẩm </i></a>
            </h4>
        </div>
        <div id="collapse${attrIndex}" class="panel-collapse collapse" style="margin: 0 5%;">
            <div class="form-group-pd">
                <label for="name" class="col-sm-5 col-form-label">Ảnh sản phẩm</label>
                <div class="frame-pd" style="width: 40%; margin-left: 30%; margin-bottom: 20px;">
                    <div class="center-pd">
                        <div class="dropzone-product">
                            <img id="previewAttr${attrIndex}" src="{{ asset('../../image/no_image.png') }}" class="upload-icon-product" />
                            <input type="file" accept="image/*" name="attributes[${attrIndex}][attribute_image]" id="imageAttr${attrIndex}" class="upload-input-product" onchange="previewImageAttribute(${attrIndex})" />
                        </div>
                        <div style="color: red">
                            @error('attributes.${attrIndex}.attribute_image')
                                {{ $message }}<br>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="color" class="col-sm-2 col-form-label">Màu sắc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="color" name="attributes[${attrIndex}][color]" value="{{ old('attributes.${attrIndex}.color') }}" placeholder="Màu sắc...">
                    <div style="color: red">
                        @error('attributes.${attrIndex}.color')
                            {{ $message }}<br>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="quantity" class="col-sm-2 col-form-label">Số lượng</label>
                <div class="col-sm-10">
                    <input type="number" name="attributes[${attrIndex}][quantity]" class="form-control" value="{{ old('attributes.${attrIndex}.quantity') }}">
                    <div style="color: red">
                        @error('attributes.${attrIndex}.quantity')
                            {{ $message }}<br>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="sale_price" class="col-sm-2 col-form-label">Giá bán</label>
                <div class="col-sm-10">
                    <input type="number" name="attributes[${attrIndex}][sale_price]" class="form-control" max="100000000" value="{{ old('attributes.${attrIndex}.sale_price') }}">
                    <div style="color: red">
                        @error('attributes.${attrIndex}.sale_price')
                            {{ $message }}<br>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
                <button type="button" class="btn btn-danger remove-attributes">Xóa thuộc tính</button>
        </div>
    `;
            attrWrapper.appendChild(newAttr);
            newAttr.querySelector('.remove-attributes').addEventListener('click', function() {
                newAttr.remove();
                removedIndices.push(newAttrIndex);
            });
            attrIndex++;
        });
        document.querySelectorAll('.remove-attributes').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.panel').remove();
            });
        });

        // load multi image product
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
            /* Khoảng cách từ trên xuống */
            right: 5px;
            /* Khoảng cách từ phải sang trái */
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

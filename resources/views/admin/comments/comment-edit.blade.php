@extends('admin.app')
@section('title', 'Admin - Quản lý bình luận')
@section('header-route')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('comments.index') }}">Quản lý bình luận</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cập nhật bình luận</li>
@endsection
@section('comment-active', 'active')
@section('content-pages')
    <h5 class="h4 mb-2 text-gray-800">Cập nhật bình luận</h5>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <p><b>Tên khách hàng: </b> {{ $comment->name }}</p>
                    <p><b>Email: </b> {{ $comment->email }}</p>
                    <p><b>Nội dung bình luận: </b> {{ $comment->content }}</p>

                    
                    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                
                        <div class="form-group">
                            <label for="reply"><b>Trả lời:</b></label>
                            <textarea class="form-control" name="reply" id="reply" rows="5"
                                      placeholder="Trả lời bình luận...">{{ old('reply', $comment->reply) }}</textarea>
                            @error('reply')
                            <div style="color: red; margin-top: 5px;">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="status"><b>Trạng thái:</b></label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" {{ $comment->status == 0 ? 'selected' : '' }}>Chưa duyệt</option>
                                <option value="1" {{ $comment->status == 1 ? 'selected' : '' }}>Đã duyệt</option>
                            </select>
                        </div>
                
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

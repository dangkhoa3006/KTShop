<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::all();
        return view('admin.comments.comment-index', compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreCommentRequest $request)
    // {
    //     //
    // }

    public function store(Request $request, $productId)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'content' => 'required',
            'name' => 'required',
            'email' => ['required', 'regex:/^[^@]+@gmail\.com$/'],
        ], [
            'name.required' => 'Họ tên không được bỏ trống.',
            'email.required' => 'Email không được bỏ trống.',
            'email.regex' => 'Email phải đúng định dạng @gmail.com',
            'content.required' => 'Bình luận không được bỏ trống.',
        ]
        );
        $comment = Comment::create([
            'product_id' => $productId,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
        ]);
        $comment->save();

        // Chuyển hướng về trang sản phẩm với thông báo thành công
        return redirect()->back()->with('payment-success', 'Bình luận của bạn đã được gửi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.comment-edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        try {
            $comment->update([
                'reply' => $request->reply,
                'status' => $request->status,
            ]);
            return redirect()->route('comments.index')->with('success', 'Cập nhật bình luận thành công.');
        } catch (\Exception $e) {
            return redirect()->route('comments.index')->with('error', 'Cập nhật bình luận không thành công.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

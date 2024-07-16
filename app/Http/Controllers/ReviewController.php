<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::all();
        return view('admin.reviews.review-index', compact('review'));
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
    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'rating' => 'required|integer|between:1,5',
        ], ['rating.required' => 'Chưa đánh giá.']
        );
        $userId = auth()->check() ? auth()->id() : null;
        // Lưu đánh giá vào cơ sở dữ liệu
        Review::create([
            'rating' => $request->rating,
            'username' => $request->name,
            'phone' => $request->phone,
            'content' => $request->content,
            'order_id' => $request->order_id,
        ]);

        // Chuyển hướng về trang chi tiết đơn hàng với thông báo thành công
        return redirect()->back()->with('payment-success', 'Đánh giá của bạn đã được gửi thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}

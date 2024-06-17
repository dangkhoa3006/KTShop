<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function Homepage()
    {
        // Lấy tất cả categories để hiển thị danh sách
        $list = Category::with(['subcategories' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->get();

        return view('clients.home-page', compact('list'));
    }
}

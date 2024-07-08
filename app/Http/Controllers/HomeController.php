<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    protected function fixImage(Product $p)
    {
        if ($p->image && Storage::disk("public")->exists($p->image)) {
            $p->image = Storage::url($p->image);
        } else {
            $p->image = '/image/no-pictures.png';
        }
    }
    public function Homepage()
    {
        // Lấy tất cả categories để hiển thị danh sách
        $list = Category::with(['subcategories' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->get();
        // Lấy sản phẩm theo danh mục và sắp xếp theo giá nếu có yêu cầu
        $query = Product::where('status', 1)->where('category_id', 1);
        $querySamsung = Product::where('status', 1)->where('category_id', 2);


        // Giới hạn số lượng sản phẩm là 8
        $listIphone = $query->take(8)->get();
        $listSamsung = $querySamsung->take(8)->get();


        foreach ($listIphone as $p) {
            $this->fixImage($p);
        }
        foreach ($listSamsung as $p) {
            $this->fixImage($p);
        }

        return view('clients.home-page', compact('list', 'listIphone', 'listSamsung'));
    }

    public function showProduct($categorySlug, Request $request)
    {
        // Lấy danh mục dựa trên slug
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        // Lấy các loại sản phẩm thuộc danh mục thông qua quan hệ trong Model
        $subCategories = $category->subCategories()->where('status', 1)->get();
        // Lấy tất cả categories để hiển thị danh sách
        $list = Category::with(['subcategories' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->get();
        // Lấy sản phẩm theo danh mục và sắp xếp theo giá nếu có yêu cầu
        $query = $category->products()->where('status', 1)->where('id', 1);
        $listProduct = $query->take(8)->get();
        foreach ($listProduct as $p) {
            $this->fixImage($p);
        }
        return view('clients.home-page', compact('list', 'listProduct'));
    }

}

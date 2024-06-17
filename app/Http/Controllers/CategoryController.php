<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lst = Category::where('status', 1)->get();
        return view('admin.categories.category-index', ['lst' => $lst]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.category-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    private function generateSlug($string)
    {
        return Str::slug($string);
    }
    public function store(StoreCategoryRequest $request)
    {
        try {
            $slug = $this->generateSlug($request->name);
            $cate = Category::create([
                'name' => $request->name,
                'slug' => $slug,
            ]);
            $cate->save();
            return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công!');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Thêm danh mục không thành công!');
        }

    }

    /**
     * Display the specified resource.
     */
    //Show danh mục sản phẩm
    // public function show(Category $category)
    // {

    // }
    protected function fixImage(Product $p)
    {
        if ($p->image && Storage::disk("public")->exists($p->image)) {
            $p->image = Storage::url($p->image);
        } else {
            $p->image = '/image/no-pictures.png';
        }
    }
    public function show($categorySlug)
    {
        // Lấy danh mục dựa trên slug
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        // Lấy các loại sản phẩm thuộc danh mục thông qua quan hệ trong Model
        $subCategories = $category->subCategories()->where('status', 1)->get();
        // Lấy tất cả categories để hiển thị danh sách
        $list = Category::with(['subcategories' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->get();
        
        $listProduct = $category->products()->where('status', 1)->get();
        foreach ($listProduct as $p) {
            $this->fixImage($p);
        }
        return view('category-pages.category-show', compact('category', 'subCategories', 'list', 'listProduct'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.category-edit', ['cate' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $slug = $this->generateSlug($request->name);
            $category->update([
                'name' => $request->name,
                'slug' => $slug,
                'status' => $request->status,
            ]);
            $category->save();
            return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Cập nhật danh mục không thành công!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}

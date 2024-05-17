<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
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
    private function generateSlug($string) {
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.category-edit',['cate'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try{
            $slug = $this->generateSlug($request->name);
            $category->update([
                'name' => $request->name,
                'slug' => $slug,
                'status'=>$request->status,
            ]);
            $category->save();
            return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
        }
        catch(\Exception $e)
        {
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

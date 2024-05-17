<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = SubCategory::where('status', 1)->get();
        return view('admin.subcategories.subcategory-index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Category::all();
        return view('admin.subcategories.subcategory-create', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    private function generateSlug($string) {
        return Str::slug($string);
    } 
    public function store(StoreSubCategoryRequest $request)
    {
        try {
            $slug = $this->generateSlug($request->name);
            $getCategory=Category::findOrFail($request->category_id);
            $subcate = SubCategory::create([
                'name' => $request->name,
                'slug' => $slug,
                'category_id'=>$request->category_id,
                'category_name'=>$getCategory->name,
            ]);
            $subcate->save();
            return redirect()->route('subcategories.index')->with('success', 'Thêm loại sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('subcategories.index')->with('error', 'Thêm loại sản phẩm không thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        $list = Category::all();
        return view('admin.subcategories.subcategory-edit',['subcate'=>$subcategory, 'list'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subcategory)
    {
        try {
            $slug = $this->generateSlug($request->name);
            $getCategory=Category::findOrFail($request->category_id);
            $subcategory->update([
                'name' => $request->name,
                'slug' => $slug,
                'category_id'=>$request->category_id,
                'category_name'=>$getCategory->name,
            ]);
            $subcategory->save();
            return redirect()->route('subcategories.index')->with('success', 'Cập nhật loại sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('subcategories.index')->with('error', 'Cập nhật loại sản phẩm không thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}

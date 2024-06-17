<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Specification;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected function fixImage(Product $p)
    {
        if ($p->image && Storage::disk("public")->exists($p->image)) {
            $p->image = Storage::url($p->image);
        } else {
            $p->image = asset('/image/no-pictures.png');
        }
    }
    public function index()
    {
        //Truy vấn theo quan hệ subcategory để lấy tên loại sản phẩm lên giao diện
        $listProduct = Product::where('status', 1)->with('subcategory')->get();
        foreach ($listProduct as $p) {
            $this->fixImage($p);
        }
        return view('admin.products.product-index', compact('listProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listCategory = Category::where('status', 1)->get();
        $data['listCategory'] = $listCategory;
        return view('admin.products.product-create', $data);
    }
    public function fetchSubCategories($category_id = null)
    {
        $subcategories = DB::table('subcategories')->where("category_id", $category_id)->where('status', 1)->get();

        return response()->json(['subcategories' => $subcategories]);
    }
    /**
     * Store a newly created resource in storage.
     */
    private function generateSlug($string)
    {
        return Str::slug($string);
    }
    public function store(StoreProductRequest $request)
    {
        try
        {
            $slug = $this->generateSlug($request->name);
            $getCategory = Category::findOrFail($request->category_id);
            $getSubCategory = SubCategory::findOrFail($request->subcategory_id);
            $p = Product::create([
                'name' => $request->name,
                'slug' => $slug,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'description' => $request->description,
                'specification' => $request->specification,
                'image' => '',
            ]);
            $path = $request->image->store('upload/product/' . $p->id, 'public');
            $p->image = $path;
            $p->save();
            //save image list
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('upload/product-detail/' . $p->id, 'public');
                    ProductImage::create([
                        'product_id' => $p->id,
                        'image_path' => $path,
                    ]);
                }
            }
            //count product_count trong bảng Category
            $getCategory->product_count += 1;
            $getCategory->save();
            //count product_count trong bảng SubCategory
            $getSubCategory->product_count += 1;
            $getSubCategory->save();
            // Lưu các thông số kỹ thuật sản phẩm
            $specifications = $request->input('specifications');
            if (is_array($specifications) && !empty($specifications)) {
                foreach ($specifications as $specification) {
                    $title = $specification['title'] ?? null;
                    $content = $specification['content'] ?? null;
                    if ($title !== null || $content !== null) {
                        try {
                            Specification::create([
                                'product_id' => $p->id,
                                'title' => $title,
                                'content' => $content,
                            ]);
                        } catch (\Exception $e) {
                            return redirect()->route('products.index')->with('error', 'Thêm thông số kỹ thuật không thành công! Lỗi: ' . $e->getMessage());
                        }
                    }
                }
            }
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.index')->with('error', 'Thêm sản phẩm không thành công: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($productSlug)
    {
        $product = Product::where('slug', $productSlug)->firstOrFail();
        $this->fixImage($product);
        $category = $product->category;
        $subcategory = $product->subcategory;
        $list = Category::with('subcategories')->get();
        return view('product-pages.product-detail', compact('product', 'category', 'subcategory', 'list'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $listCategory = Category::all();
        $listSubcategory = Subcategory::where('category_id', $product->category_id)->get();
        $this->fixImage($product);
        return view('admin.products.product-edit', ['p' => $product, 'listCategory' => $listCategory, 'listSubcategory' => $listSubcategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            //kiem tra co cap nhat anh hay khong
            $path = $product->image;
            if ($request->hasFile('image') && $request->image->isValid()) {
                // Xóa ảnh cũ
                Storage::disk('public')->delete($product->image);
                // Lưu ảnh mới
                $path = $request->image->store('upload/product/' . $product->id, 'public');
            }
            $slug = $this->generateSlug($request->name);
            $product->update([
                'image' => $path,
                'name' => $request->name,
                'slug' => $slug,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'description' => $request->description,
                'status' => $request->status,
            ]);
            $product->save();
            // Cập nhật ảnh chi tiết nếu có ảnh mới
            if ($request->hasFile('images')) {
                // Xóa ảnh chi tiết cũ
                foreach ($product->images as $detailImage) {
                    Storage::disk('public')->delete($detailImage->image_path);
                    $detailImage->delete();
                }

                // Lưu ảnh chi tiết mới
                foreach ($request->file('images') as $image) {
                    $path = $image->store('upload/product-detail/' . $product->id, 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                    ]);
                }
            }
            // Cập nhật số lượng sản phẩm trong Category và SubCategory nếu chúng thay đổi
            $oldCategory = $product->category;
            $oldSubCategory = $product->subcategory;

            if ($product->category_id != $request->category_id) {
                $oldCategory->product_count -= 1;
                $oldCategory->save();

                $newCategory = Category::findOrFail($request->category_id);
                $newCategory->product_count += 1;
                $newCategory->save();
            }

            if ($product->subcategory_id != $request->subcategory_id) {
                $oldSubCategory->product_count -= 1;
                $oldSubCategory->save();

                $newSubCategory = SubCategory::findOrFail($request->subcategory_id);
                $newSubCategory->product_count += 1;
                $newSubCategory->save();
            }
            
            // Xóa các thông số kỹ thuật cũ
            Specification::where('product_id', $product->id)->delete();

            // Thêm các thông số kỹ thuật mới chỉ khi có thông số kỹ thuật mới được gửi lên từ form
            $specifications = $request->input('specifications');
            if (!empty($specifications)) {
                foreach ($specifications as $specification) {
                    $title = $specification['title'] ?? null;
                    $content = $specification['content'] ?? null;
                    if ($title !== null || $content !== null) {
                        Specification::create([
                            'product_id' => $product->id,
                            'title' => $title,
                            'content' => $content,
                        ]);
                    }
                }
            }
            return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Cập nhật sản phẩm không thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

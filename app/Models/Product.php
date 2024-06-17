<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['image','name','slug','description','price','sale_price','quantity','category_id','subcategory_id','status'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','slug','subcategory_count','product_count','status'];
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    //Sửa lại tên bảng
    protected $table = 'subcategories';
    protected $fillable = ['name','slug','category_name','category_id','product_count','status'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

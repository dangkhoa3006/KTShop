<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'code', 'username', 'phone', 'email', 'delivery_method', 'province_id',
        'district_id', 'ward_id', 'address', 'total', 'payment_method', 'status'];
    protected $dates = ['deleted_at'];
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

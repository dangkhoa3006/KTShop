<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'amount', 'payment_method', 'transaction_id', 'status'
    ];

    // Định nghĩa các giá trị trạng thái
    const STATUS_PENDING = 2;
    const STATUS_COMPLETED = 1;
    const STATUS_FAILED = 0;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

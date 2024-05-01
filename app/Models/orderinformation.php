<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderinformation extends Model
{
    use HasFactory;
    protected $table = 'orderinformation';
    protected $fillable = [
        'customer_id',
        'order_id',
        'product_id',
        'quantity',
        'price',
        'total',
        'status',
        'payment_status',
        'payment_method',
        'payment_id',
        'payment_date',
        'payment_amount',
        'customer_notes',
        'order_date',
        'kitchen_notes',
        'delivery_date',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkoutitem extends Model
{
    use HasFactory;
    protected $table = 'orderitem';
    protected $fillable = [
        'orderID',
        'productID',
        'price',
        'quantity',
    ];
}

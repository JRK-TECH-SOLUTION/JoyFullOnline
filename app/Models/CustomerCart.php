<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCart extends Model
{
    use HasFactory;
    protected $table = 'customerCart';
    protected $fillable = ['customerID','productID','quantity','price','total'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productinformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'productname', 'productdescription', 'productprice', 'productquantity', 'productcategory', 'productimage', 'productstatus',
    ];
}

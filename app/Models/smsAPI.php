<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smsAPI extends Model
{
    use HasFactory;
    protected $table = 'smsapi';
    protected $fillable = ['api_key', 'sender_name', 'link'];

}

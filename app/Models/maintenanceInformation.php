<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintenanceInformation extends Model
{
    use HasFactory;
    protected $table = 'maintenanceInformation';
    protected $fillable = ['affected', 'status'];

}

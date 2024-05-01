<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class customerInformation extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'customerInformation';
    protected $fillable = [
        'FullName',
        'Email',
        'PhoneNumber',
        'Address',
        'Password',
        'Status',
    ];
     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'Password',

    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'mobile',
        'address',
        'password',
        'otp',
        'image',
    ];
    protected $attributes = [
        'otp'=> '0'
    ];
}

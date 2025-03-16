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

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}

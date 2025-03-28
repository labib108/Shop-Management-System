<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customers(){
        return $this->hasMany(Customer::class);
    }
}

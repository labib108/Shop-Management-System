<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;   
    protected $fillable = [
        'category_name',
        'user_id'
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}

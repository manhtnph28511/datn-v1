<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];
    public function carts()
    {
        return $this->hasMany(Cart::class, 'color_id');
    }
    public function products()
{
    return $this->hasMany(Product::class);
}
}

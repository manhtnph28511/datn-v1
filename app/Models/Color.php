<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable = ['name','code'];
    public function carts()
    {
        return $this->hasMany(Cart::class, 'color_id');
    }
    public function products()
{
    return $this->hasMany(Product::class);
}
public function variants()
{
    return $this->hasMany(ProductVariant::class);
}
}

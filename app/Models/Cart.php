<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'pro_id',
        'user_id',
        'size_id',
        'color_id',
        'price',
        'quantity',
        'total_price',
        'discounted_total_price',
        'final_price'

    ];

    public function size()
{
    return $this->belongsTo(Size::class, 'size_id');
}

public function color()
{
    return $this->belongsTo(Color::class, 'color_id');
}
}

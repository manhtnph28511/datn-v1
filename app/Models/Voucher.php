<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'discount', 'discount_type', 'starts_at', 'expires_at', 'product_id', 'usage_count','quantity'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];



}

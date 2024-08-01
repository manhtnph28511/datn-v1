<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'order_status',
        'shipment_status',
        'payment_method',
        'username',
        'phone',
        'address',
        'note'
    ];
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id','id');
    }
    public function orderUpdates()
    {
        return $this->hasMany(OrderUpdate::class, 'order_id', 'id');
    }
}

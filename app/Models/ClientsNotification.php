<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsNotification extends Model
{
    use HasFactory;

    protected $fillable=['user_id', 'type', 'data', 'is_read'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function markAsRead()
    {
        $this->is_read = true;
        $this->save();
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

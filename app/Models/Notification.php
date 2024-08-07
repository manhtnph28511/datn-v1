<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable=['order _id', 'type', 'data', 'is_read'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function markAsRead()
    {
        $this->is_read = true;
        $this->save();
    }
}

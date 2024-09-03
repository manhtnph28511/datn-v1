<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'is_admin', 'message','file_up'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'sub_categories';
    protected $fillable = ['name','slug','description','categories_id'];

    public function getCateName() {
        return Category::find($this->categories_id);
    }
   public function products()
    {
        return $this->hasMany(Product::class, 'cate_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id'); 
    }
}


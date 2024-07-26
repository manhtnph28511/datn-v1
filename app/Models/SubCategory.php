<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'sub_categories';
    protected $fillable = ['name','slug','description','parent_id'];

    public function getCateName() {
        return Category::find($this->parent_id);
    }
}

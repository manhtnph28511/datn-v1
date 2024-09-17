<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'slug',
        'image',
        'view',
        'cate_id',
        'brand_id',
        'color_id',
        'size_id',
        'status_id',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
    public function subCategory(): BelongsTo {
        return $this->belongsTo(SubCategory::class,'cate_id','id');
    }

    public function statusProduct(): BelongsTo {
        return $this->belongsTo(StatusProduct::class,'status_id','id');
    }
    public function color()
{
    return $this->belongsTo(Color::class);
}

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function product_variants()
{
    return $this->hasMany(ProductVariant::class, 'product_id');
}



    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'product_id');
    }

    public function blog()
{
    return $this->belongsTo(Blog::class);
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='product';
    public $timestamps=false;

    protected $fillable=[
        'productname',
        'pricesell',
        'priceentry',
        'description',
        'content',
        'productcode',
        'category_id',
        'brand_id',
        'images',
        'status',
        'discount'
    ];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }
}

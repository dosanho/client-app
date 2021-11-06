<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table='brand';
    public $timestamps=false;

    protected $fillable=[
        'brandcode',
        'brandname'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'id','brand_id');
    }
}

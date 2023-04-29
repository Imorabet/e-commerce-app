<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'img',
        'id_categories',
    ];
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo(Category::class,'id_categories');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class,'id_carts');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class,'id_products');
    }
}

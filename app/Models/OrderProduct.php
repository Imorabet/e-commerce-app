<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_orders',
        'id_products',
        'quantity',
        'price',
        'total',
    ];
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class,'id_orders');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'id_products');
    }

}

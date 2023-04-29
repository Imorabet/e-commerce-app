<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_products',
        'id_users',
        'quantity',
    ];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class,'id_products');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_users');
    }
}

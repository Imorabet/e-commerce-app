<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_users',
        'order_date',
        'order_status',
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class,'id_users');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'id_orders');
    }
    
}

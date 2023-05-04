<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
{
    $user = Auth::user();
    $items = $user->carts;

    // Create the order
    $order = Order::create([
        'user_id' => $user->id,
        'status' => 'pending',
    ]);

    // Add the order items
    foreach ($items as $item) {
        OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
        ]);
    }

    // Clear the user's cart
    $user->carts->delete(); 

    // Redirect to the order confirmation page
    return redirect()->route('orders.show', ['id' => $order->id]);
}

}

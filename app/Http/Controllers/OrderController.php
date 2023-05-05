<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrders(){
        $user = auth()->user();
        $orders = Order::with('orderProducts')
            ->where('id_users', $user->id)
            ->get();
        return view('Layouts.Client.orders', ['orders' => $orders]);
    }
    
    public function placeOrder(Request $request)
{
    // Get the authenticated user
    $user = auth()->user();

    // Create a new order instance
    $order = new Order();
    $order->id_users = $user->id;
    $order->order_status='pending';
    $order->save();

    // Get the cart items for the current user
    $cartItems = Cart::where('id_users', $user->id)->get();

    // Loop through each cart item and create a new order product instance
    foreach ($cartItems as $cartItem) {
        $orderProduct = new OrderProduct();
        $orderProduct->id_orders = $order->id;
        $orderProduct->id_products = $cartItem->id_products;
        $orderProduct->quantity = $cartItem->quantity;
        $orderProduct->price = $cartItem->product->price;
        $orderProduct->total=round($cartItem->quantity*$cartItem->product->price,2);
        $orderProduct->save();

    }
    
    Cart::where('id_users', $user->id)->delete();

 
    return redirect()->route('order.all')->with('success','Order placed successfully!');
}
public function getAllOrders(){
    $orders=Order::all();
    return view('Layouts.Admin.orders',['orders'=>$orders]);
}



}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getItems()
    {
        $items = Cart::all();
        return view('Layouts.Client.cart', ['items' => $items]);
    }
    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::where('id_users', auth()->id())
            ->where('id_products', $product->id)
            ->first();

        if (!$cartItem) {
            $cartItem = new Cart;
            $cartItem->id_users = auth()->id();
            $cartItem->id_products = $product->id;
            $cartItem->quantity = 1;
            $cartItem->save();
        } else {
            $cartItem->quantity++;
            $cartItem->save();
        }

        return redirect()->back()->withToastSuccess('Product added to cart successfully.');
    }
    public function destroy($id){
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
        }
        return redirect()->route('cart.all')->withToastSuccess('Item removed from cart successfully.');;
    }
    public function update(Request $request,$id)
    {
        $item = Cart::findOrFail($id);
        $item->quantity=$request->input('quantity');
        $item->save();
        return redirect()->route('cart.all')->withToastSuccess('Quantity confirmed successfully');
        }
    
}

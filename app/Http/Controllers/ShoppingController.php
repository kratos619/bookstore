<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Product;

class ShoppingController extends Controller
{
    public function add_to_cart(Request $request)
    {
        
        //$pdt =request();
        $selected_item = $request->pdt_id;
        
        $pdt = Product::find($selected_item);
        
        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        
        //dd(Cart::content());

        return redirect()->route('cart');
    }

    public function cart()
    {
        //Cart::destroy();
        return view('cart');
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
}

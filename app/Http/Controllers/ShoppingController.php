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
        
        $cart = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);
        
        //dd($cart);

        return redirect()->route('cart');
    }

    public function cart()
    {
        return view('cart');
    }
}

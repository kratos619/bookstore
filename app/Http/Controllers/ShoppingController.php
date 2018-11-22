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
        dd($request->p_id);
        
        //$pdt = Product::find();
        
        // $cart = Cart::add([
        //     'id' => $pdt->id,
        //     'name' => $pdt->name,
        //     'qty' => request()->qty,
        //     'price' => $pdt->price
        // ]);
        
        //dd($pdt);

        // return redirect()->route('cart');
    }

    public function cart()
    {
        return view('cart');
    }
}

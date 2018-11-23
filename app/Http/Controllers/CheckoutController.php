<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function index()
    {
        return \view('checkout');
    }

    public function pay()
    {
        //  dd(request()->all());

        Stripe::setApiKey("sk_test_V4tIgxkmQFL8zflHYTbwtg0p");

//        $token = request()->stripeToken;
        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' =>  'My Book Store ',
            'source' =>request()->stripeToken
        ]);

        dd('yment success');
        //dd($charge);
    }
}

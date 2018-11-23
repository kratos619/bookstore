<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CheckoutController extends Controller
{
    public function index()
    {
        return \view('checkout');
    }
}

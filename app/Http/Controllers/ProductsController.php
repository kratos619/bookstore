<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_products = Product::all();
        return \view('products.index')->with('products', $all_products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);

        $product = new Product;
        
        //rename and move uploaded file image
        $product_image = $request->image;

        $product_image_new_name = time() . $product_image->getClientOriginalName();

        $product_image->move('uploades/products', $product_image_new_name);

        // add new data to db

        $product->name = $request->name;
        $product->image = 'uploades/products' . $product_image_new_name;
        $product->price = $request->price;
        $product->description = $request->description;

        // save to db
        $product->save();

        // create session

        Session::flash('success', 'Product Added Successfuly');

        return redirect('products');





        return \redirect('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

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
        //$selecte_id = Product::find($id);
        return view('products.edit', ['product' => Product::find($id)]);
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $selecte_product  = Product::find($id);

        if ($request->hasFile('image')) {
            $product_image = $request->image;

//             $product_image = $request->image;

            $product_image_new_name = time() . $product_image->getClientOriginalName();

            $product_image->move('uploades/products', $product_image_new_name);

            $selecte_product->save();
        }

        $selecte_product->name = $request->name;
        $selecte_product->description = $request->description;
        $selecte_product->price = $request->price;

        $selecte_product->save();

        Session::flash('success', 'Product Update');
        return \redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selecte_product = Product::find($id);
     
        if (file_exists($selecte_product->image)) {
            unlink($selecte_product->image);
        }

        $selecte_product->delete();
     
        Session::flash('success', 'Product Is Delete');
        return redirect('products');
    }
}

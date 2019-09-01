<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        // $count = Product::all();
        $category = Category::all();
        return view('product.show')->with('products', $product)
                                    ->with('cat', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        return view('product.add')->with('category', $cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'              => ['required', 'string', 'min:3'],
            'category_id'       => ['required', 'string'],
            'brand'             => ['required', 'string', 'min:3'],
            'price'             => ['required', 'string', 'max:30'],
            'variant'           => ['array', 'required'],
            'value'             => ['array', 'required'],
        ]);
        if($data)
        {
            $product = Product::create([
                'name'              => $data['name'],
                'category_id'       => decrypt($data['category_id']),
                'brand'             => $data['brand'],
                'price'             => $data['price'],
                'variant_category'  => json_encode($data['variant']),
                'variant_value'     => json_encode($data['value']),
            ]);
            if($product)
                return redirect()->route('home')->withSuccess('Product Add Successfully.');
            else
                return back()->withErrors('Error adding Product.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

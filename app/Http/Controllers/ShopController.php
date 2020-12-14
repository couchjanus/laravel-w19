<?php

namespace App\Http\Controllers;

use App\Models\{Product, Category};
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brand')->with('categories')->paginate(12);
        return view('site.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::whereId($id)->with('brand')->with('categories')->with('pictures')->firstOrFail();
        return view('site.product', compact('product'));
    }

    public function show1($slug) {
        if (is_numeric($slug)) {
            $product = Product::findOrFail($slug);
            return redirect(route('site.show', $product->slug), 301);
        }
 
        $product = Product::whereSlug($slug)->with('brand')->with('categories')->firstOrFail();
        return view('site.show',compact('product'));
    }
 

    public function getByBrand($id)
    {
        $products = Product::where([['brand_id', $id]])->with('categories')->with('brand')->with('pictures')->paginate(12);
        return view('site.index', compact('products'));
    }

    public function getByCategory($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products()->wherePivot('category_id', $id)
            ->with('brand')
            ->with('categories')
            ->paginate(12);
            
        return view('site.index', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

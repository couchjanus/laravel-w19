<?php

namespace App\Http\Controllers;

use App\Models\{Product, Category};
use Illuminate\Http\Request;
use Cart;

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

    public function addToCart(Request $request)
    {
        $product = Product::whereId($request->input('productId'))->with('brand')->with('categories')->with('pictures')->firstOrFail();
        $options = $request->except('_token', 'productId', 'price', 'qty');
        $options = ['picture'=>$product->pictures[0]->filename];
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

}

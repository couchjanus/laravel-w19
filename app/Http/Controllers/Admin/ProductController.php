<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Product, Brand, Category};
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
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);

        // $products = Product::where('featured', 1)
        //       ->orderBy('id', 'desc')
        //       ->take(10)
        //       ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'brands'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'name'=>$request->name, 
            'details' => $request->details, 
            'price' => $request->price, 
            'brand_id' => $request->brand_id, 
            'description' => $request->description,
            // 'image' => $this->uploadImage($request->file("cover")),
        ]);
    
        $category = Category::find($request->categories);
        $product->categories()->attach($category);
    
        // $product->categories()->sync($request->input('categories', []));
        return redirect()->route('admin.products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('categories', 'brands', 'product'));        
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
        $product->update([
            'name'=>$request->name,
            'details'=>$request->details,
            'price'=>$request->price,
            'description'=>$request->description,
            'featured'=>($request->featured =='on')?1:0,
            ]);
        $product->categories()->sync($request->categories);
        return redirect()->route('admin.products.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    public function trashed()   {
        $products = Product::onlyTrashed()->paginate();
        return view('admin.products.trashed', compact('products'));
    }

    public function restore($id)   {
        Product::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect(route('admin.products.trashed'));
    }

    public function productDestroy($id)    {
        $product = Product::withTrashed()
                ->findOrFail($id);
        $product->forceDelete();
        return redirect()->route('admin.products.index');
    }

    public function force($id)
    {
        $product = Product::withTrashed()->where('id', $id)->first(); 
        $product->forceDelete();
        return redirect()->route('admin.products.index');
    }

 
}

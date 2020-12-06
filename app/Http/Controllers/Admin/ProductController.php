<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('products')->insert(
            ['name' => $request->name, 'price' => $request->price, 'details' => $request->details, 'description' => $request->description]
        );
        
        // Если таблица имеет поле с арибутом Auto_Increment, метод insertGetId вернет номер последней  вставленной записи:
        // $id = DB::table('products')->insertGetId(['name' => $request->name, 'price' => $request->price, 'details' => $request->details, 'description' => $request->description]);
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
        $product->update([
            'name'=>$request->name,
            'details'=>$request->details,
            'price'=>$request->price,
            'description'=>$request->description,
            'featured'=>($request->featured =='on')?1:0,
            ]);
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

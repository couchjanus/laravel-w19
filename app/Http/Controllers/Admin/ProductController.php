<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Product, Brand, Category, Picture};
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();
        return view('admin.products.index', ['products' => $products]);
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
        //  $product = Product::create([
        //     'name'=>$request->name, 
        //     'details' => $request->details, 
        //     'price' => $request->price, 
        //     'brand_id' => $request->brand_id, 
        //     'description' => $request->description,
        // ]);
        $product = Product::create($request->all());
        $category = Category::find($request->categories);
        $product->categories()->attach($category);

        foreach ($request->images as $file) {
            $filename = $this->uploadImage($file);
            $picture = Picture::create([
                'filename'=>$filename, 
            ]);
            $product->pictures()->attach($picture->id);
        }
        
        return redirect()->route('admin.products.index')->withMessage('Product created successfully');
    }

    private function uploadCover(UploadedFile $file) : string
    {
        $filename = md5($file->getClientOriginalName() . time()).uniqid('', true);
        $file->storeAs("public/covers", $filename);
        return asset("storage/covers/". $filename);
    }

    public function uploadImage(UploadedFile $file) : string
    {
        $img = Image::make($file);
        $filename = md5($file->getClientOriginalName() . time()).uniqid('', true);
        $originalPath = 'app/public/products';

        $img->resize(520, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path($originalPath)."/".$filename);
        return asset("storage/products/". $filename;
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
        // $product->update([
        //     'name'=>$request->name,
        //     'details'=>$request->details,
        //     'price'=>$request->price,
        //     'description'=>$request->description,
        //     'featured'=>($request->featured =='on')?1:0,
        //     ]);
        // $product->categories()->sync($request->categories);
 
        $product->update($request->all());

        if($request->images) {
            $ids = $request->images;
            foreach ($ids as $id) {
                $picture = Picture::where('id', $id)->first();
                $filename = parse_url($picture->filename, PHP_URL_PATH);
                Storage::delete("public/products/" . $filename);
                $product->pictures()->detach($id);
                $picture->delete();
            }
            foreach ($request->images as $file) {
                $filename = $this->uploadImage($file);
                $picture = Picture::create([
                    'filename'=>$filename, 
                ]);
                $product->pictures()->attach($picture->id);
            }
        }
        $product->categories()->sync($request->categories);
        return redirect()->route('admin.products.index')->withMessage('Product updated successfully');
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
        $ids = \DB::table('picture_product')
            ->where('product_id', $product->id)->get();
        
        foreach ($ids as $id) {
            $picture = Picture::where('id', $id)->first();
            $filename = parse_url($picture->filename, PHP_URL_PATH);
            Storage::delete("public/products/" . $filename);
            $product->pictures()->detach($id);
            $picture->delete();
        }
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

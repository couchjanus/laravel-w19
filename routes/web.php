<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function() {
    Route::get('', 'Dashboard')->name('home');
    Route::resource('categories', 'CategoryController');
    Route::get('products/trashed', 'ProductController@trashed')->name('products.trashed');
    Route::post('products/restore/{id}', 'ProductController@restore')->name('products.restore');
    Route::delete('products/force/{id}', 'ProductController@force')->name('products.force');
  
    Route::resource('products', 'ProductController');
});

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index']);
Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.product');
// getByBrand
Route::get('/shop/by_brand/{id}', [App\Http\Controllers\ShopController::class, 'getByBrand'])->name('product.by.brand');
Route::get('/shop/by_category/{id}', [App\Http\Controllers\ShopController::class, 'getByCategory'])->name('product.by.category');


Route::get('posts-by-featured', function () {
    $brand = \App\Models\Brand::find(7);
    // dump($brand);
    // $products = $user->products;
    // dump($products);
    $products = $brand->products->where('featured', 1)->all();
    foreach ($products as $product) {
        dump($product);
    }
 });
 
Route::get('/test1', function () {
    $result = Product::where('id', '>', 40)->take(10)->get();
    $result = Product::where([['id','>', 10],['featured', '=', 1],])->get();

    $result = Product::where('featured', 1)->get();
    // В: 
    $result = Product::whereFeatured(1)->get();

    $result = Product::whereDate('created_at', date('Y-m-d'));
    $result = Product::whereDay('created_at', date('d'));
    $result = Product::whereMonth('created_at', date('m'));
    $result = Product::whereYear('created_at', date('2020'))->get();
    dump($result);
});



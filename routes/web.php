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


Route::get('/test', function () {
    $products = DB::table('products')
    ->where('id', '>=', 10)
    ->get();
    
    $products = DB::table('products')
            ->where('id', '<>', 10)
            ->get();
    
    $products = DB::table('products')
            ->where('name', 'like', 'a%')
            ->get();
    
    
    $products = DB::table('products')->where([
        ['featured', '=', '1'],
        ['id', '>', '10'],
    ])->get();

    $products = DB::table('products')
        ->where('id', '>', 10)
        ->orWhere('featured', true)
        ->get();

    $products = DB::table('products')
        ->whereBetween('id', [1, 10])->get();
    
    $products = DB::table('products')
        ->whereNotBetween('id', [1, 10])
        ->get();

    $products = DB::table('products')
        ->whereIn('id', [1, 2, 3])
        ->get();

    $products = DB::table('products')
        ->whereNotIn('id', [1, 2, 3])
        ->get();

    $products = DB::table('products')
        ->whereNull('updated_at')
        ->get();
    $products = DB::table('products')
        ->whereNotNull('updated_at')
        ->get();

    
    $products = DB::table('products')
        ->whereDate('created_at', '2020-09-16')
        ->get();
    $products = DB::table('products')
        ->whereMonth('created_at', '09')
        ->get();
    $products = DB::table('products')
        ->whereDay('created_at', '18')
        ->get();
    $products = DB::table('products')
        ->whereYear('created_at', '2020')
        ->get();


    $products = DB::table('products')
        ->whereColumn('updated_at', '>', 'created_at')
        ->get();
        
        
    $products = \DB::table('products')
        ->whereColumn([
                ['price', '>', 100],
                ['updated_at', '>', 'created_at']
        ])->get();
    
    $products = DB::table('products')->orderBy('id', 'desc')->take(5)->get();
    $products = DB::table('products')->orderBy('id', 'desc')->skip(10)->take(5)->get();
    $products = \DB::table('products')
        ->offset(10)
        ->limit(5)
        ->get();

    dd($products);
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



<?php

use Illuminate\Support\Facades\Route;

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
    Route::resource('brands', 'BrandController');
});

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index']);
Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.product');
Route::get('/shop/by_brand/{id}', [App\Http\Controllers\ShopController::class, 'getByBrand'])->name('product.by.brand');
Route::get('/shop/by_category/{id}', [App\Http\Controllers\ShopController::class, 'getByCategory'])->name('product.by.category');

// Route::get('/dashboard', function () {
//     return redirect('home/dashboard');
// });

// return redirect()->route('login');
// For a route with the following URI: /profile/{id}
// return redirect()->route('profile', ['id' => 1]);

// Route::post('/user/profile', function () {
//     return redirect('dashboard')->with('status', 'Profile updated!');
// });


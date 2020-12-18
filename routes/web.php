<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsersTable;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function() {
    Route::get('', 'Dashboard')->name('home');
    Route::resource('categories', 'CategoryController');
    Route::get('products/trashed', 'ProductController@trashed')->name('products.trashed');
    Route::post('products/restore/{id}', 'ProductController@restore')->name('products.restore');
    Route::delete('products/force/{id}', 'ProductController@force')->name('products.force');
  
    Route::resource('products', 'ProductController');
    Route::resource('brands', 'BrandController');
    Route::resource('users', 'UserController');
});

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.product');
Route::get('/shop/by_brand/{id}', [App\Http\Controllers\ShopController::class, 'getByBrand'])->name('product.by.brand');
Route::get('/shop/by_category/{id}', [App\Http\Controllers\ShopController::class, 'getByCategory'])->name('product.by.category');


// Route::get('/users', UsersTable::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


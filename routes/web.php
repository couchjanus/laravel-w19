<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsersTable;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin']], function() {
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

Route::get('/test', function () {   
    Log::info('A user has arrived at the welcome page.');
    return '<h1>Welcome back User</h1>';
});

Route::get('reminder', function () {
    return new \App\Mail\Reminder();
})->name('reminder');

Route::get('remind', function () {
    return new \App\Mail\Reminder('Blahuoooo!');
})->name('reminder');
 
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');


Route::post('rem', function (\Illuminate\Http\Request $request) {dd($request);})->name('reminder');

Route::post('rem', function (
   \Illuminate\Http\Request $request,
   \Illuminate\Mail\Mailer $mailer) {
          $mailer->to($request->email)->send(new \App\Mail\Reminder($request->event));
          return redirect()->back();})->name('reminder');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
 
 
         
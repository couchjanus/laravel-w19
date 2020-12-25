<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UsersTable;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin']], function() {
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', ], function() {
    Route::get('', 'Dashboard')->name('home');
    Route::resource('categories', 'CategoryController');
    Route::get('products/trashed', 'ProductController@trashed')->name('products.trashed');
    Route::post('products/restore/{id}', 'ProductController@restore')->name('products.restore');
    Route::delete('products/force/{id}', 'ProductController@force')->name('products.force');
  
    Route::resource('products', 'ProductController');
    Route::resource('brands', 'BrandController');
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('roles', 'RoleController');
});

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.product');
Route::get('/shop/by_brand/{id}', [App\Http\Controllers\ShopController::class, 'getByBrand'])->name('product.by.brand');
Route::get('/shop/by_category/{id}', [App\Http\Controllers\ShopController::class, 'getByCategory'])->name('product.by.category');

Route::post('/product/add/cart', [App\Http\Controllers\ShopController::class, 'addToCart'])->name('product.add.cart');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'getCart'])->name('checkout.cart');
Route::get('/cart/item/{id}/remove', [App\Http\Controllers\CartController::class, 'removeItem'])->name('checkout.cart.remove');
Route::get('/cart/clear', [App\Http\Controllers\CartController::class, 'clearCart'])->name('checkout.cart.clear');


// Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'getCheckout'])->name('checkout.index');
    Route::post('/checkout/order', [App\Http\Controllers\CheckoutController::class, 'placeOrder'])->name('checkout.place.order');
    Route::get('checkout/payment/complete', [App\Http\Controllers\CheckoutController::class, 'complete'])->name('checkout.payment.complete');

    // Route::get('account/orders', [App\Http\Controllers\AccountController::class, 'getOrders'])->name('account.orders');
// });


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/test', function () {   
    Log::info('A user has arrived at the welcome page.');
    return '<h1>Welcome back User</h1>';
});


Route::get('remind', function () {
    return new \App\Mail\Reminder('Blahuoooo!');
})->name('reminder');
 
Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
         
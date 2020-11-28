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


// Route::resource('admin/categories', 'App\Http\Controllers\Admin\CategoryController');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function() {
    // Route::resource('admin/categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('categories', 'CategoryController');
});

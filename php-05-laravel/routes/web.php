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

Auth::routes();

Route::group(['as'=>'admin.','prefix'=>'admin','middleware' => ['role:admin']],  function () {

    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class)->except(['show']);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class)->except(['show']);

});

Route::group(['middleware' => ['role:user|admin']], function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


});

Route::group(['middleware' => ['role:admin']],  function () {

    Route::delete(
        'ajax/images/{image}',
        \App\Http\Controllers\Ajax\RemoveImageController::class
    )->name('ajax.images.delete');

});

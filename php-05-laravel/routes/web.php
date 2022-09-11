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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('categories', \App\Http\Controllers\CategoriesController::class)->only(['show', 'index']);
Route::resource('products', \App\Http\Controllers\ProductsController::class)->only(['show', 'index']);

Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('cart/{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::delete('cart', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/{product}/count', [\App\Http\Controllers\CartController::class, 'countUpdate'])->name('cart.count.update');

Route::group(['as'=>'admin.','prefix'=>'admin','middleware' => ['role:admin']],  function () {

    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class)->except(['show']);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class)->except(['show']);

});

Route::group(['middleware' => ['role:user|admin']], function () {

    Route::get('wishlist/{product}/add', [\App\Http\Controllers\WishListController::class, 'add'])->name('wishlist.add');
    Route::delete('wishlist/{product}/delete', [\App\Http\Controllers\WishListController::class, 'delete'])->name('wishlist.delete');

    Route::post('product/{product}/rating/add', [\App\Http\Controllers\ProductsController::class, 'addRating'])->name('product.rating.add');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::name('account.')->prefix('account')->group(function(){
        Route::get('/', [\App\Http\Controllers\Account\UsersController::class, 'index'])->name('index');
        Route::put('{user}/update', [\App\Http\Controllers\Account\UsersController::class, 'update'])->name('update');
        Route::get('{user}/edit', [\App\Http\Controllers\Account\UsersController::class, 'edit'])
            ->name('edit')
            ->middleware('can:view,user');
        Route::get('wishlist', \App\Http\Controllers\Account\WishListController::class)->name('wishlist');
    });


});

Route::group(['middleware' => ['role:admin']],  function () {

    Route::delete(
        'ajax/images/{image}',
        \App\Http\Controllers\Ajax\RemoveImageController::class
    )->name('ajax.images.delete');

});


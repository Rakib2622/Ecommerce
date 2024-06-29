<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

route::get('/', [HomeController::class,'home']);
route::get('/dashboard', [HomeController::class,'home'])->
    middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/product_detail/{id}', [ProductController::class, 'show'])->name('product_detail');
Route::get('/all_products', [ProductController::class, 'allProducts'])->name('all_products');

Route::get('/buy_now/{id}', [ProductController::class, 'buyNow'])->name('buy_now');
Route::get('/add_to_cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');



route::get('admin/dashboard', [HomeController::class,'index'])->
    middleware(['auth','admin']);

    #admin Category
route::get('view_category', [AdminController::class,'view_category'])->
    middleware(['auth','admin']);
route::post('add_category', [AdminController::class,'add_category'])->
    middleware(['auth','admin']);
route::get('delete_category/{id}', [AdminController::class,'delete_category'])->
    middleware(['auth','admin']);
route::get('edit_category/{id}', [AdminController::class,'edit_category'])->
    middleware(['auth','admin']);
route::post('update_category/{id}', [AdminController::class,'update_category'])->
    middleware(['auth','admin']);

#admin Product
route::get('view_product', [AdminController::class,'view_product'])->
    middleware(['auth','admin']);
route::get('show_add_product', [AdminController::class,'show_add_product'])->
    middleware(['auth','admin']);
route::post('add_product', [AdminController::class,'add_product'])->
    middleware(['auth','admin']);
route::get('delete_product/{id}', [AdminController::class,'delete_product'])->
    middleware(['auth','admin']);
route::get('edit_product/{id}', [AdminController::class,'edit_product'])->
    middleware(['auth','admin']);
route::post('update_product/{id}', [AdminController::class,'update_product'])->
    middleware(['auth','admin']);
route::get('search_product', [AdminController::class,'search_product'])->
    middleware(['auth','admin']);
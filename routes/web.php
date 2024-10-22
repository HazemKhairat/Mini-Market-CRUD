<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;

// Route::get('/', function(){
//     return view('home');
// })->name('home');
Route::get('/', [HomeController::class, 'index'])->name("home");


Route::prefix('products')->name('product.')->group(function(){
    Route::get('/index', [ProductController::class, 'index'])->name("index");
    Route::get('/create',[ProductController::class, 'create'])->name("create");
    Route::post('/store',[ProductController::class, 'store'])->name("store");
    // Routes With ID
    Route::get('/edit{id}',[ProductController::class, 'edit'])->name("edit");
    Route::post('/update{id}',[ProductController::class, 'update'])->name("update");
    Route::get('/show{id}',[ProductController::class, 'show'])->name("show");
    Route::get('/destroy{id}',[ProductController::class, 'destroy'])->name("destroy");
});

Route::prefix('customers')->name('customer.')->group(function(){
    Route::get('/index', [CustomerController::class, 'index'])->name("index");
    Route::get('/create',[CustomerController::class, 'create'])->name("create");
    Route::post('/store',[CustomerController::class, 'store'])->name("store");
    // Routes With ID
    Route::get('/edit{id}',[CustomerController::class, 'edit'])->name("edit");
    Route::post('/update{id}',[CustomerController::class, 'update'])->name("update");
    Route::get('/show{id}',[CustomerController::class, 'show'])->name("show");
    Route::get('/destroy{id}',[CustomerController::class, 'destroy'])->name("destroy");
});


Route::prefix('categories')->name('category.')->group(function(){
    Route::get('/index', [CategoryController::class, 'index'])->name("index");
    Route::get('/create',[CategoryController::class, 'create'])->name("create");
    Route::post('/store',[CategoryController::class, 'store'])->name("store");
    // Routes With ID
    Route::get('/edit{id}',[CategoryController::class, 'edit'])->name("edit");
    Route::post('/update{id}',[CategoryController::class, 'update'])->name("update");
    Route::get('/show{id}',[CategoryController::class, 'show'])->name("show");
    Route::get('/destroy{id}',[CategoryController::class, 'destroy'])->name("destroy");
});



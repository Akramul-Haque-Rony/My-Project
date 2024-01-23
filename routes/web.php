<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
    return view('welcome');
});
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Inventory Product Category
    Route::get('product/category/list', [App\Http\Controllers\CategoryController::class, 'index'])->name('productCategory.index');
    Route::post('product/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('productCategory.store');
    Route::post('product/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('productCategory.update');
    
    Route::get('product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('product/update', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('product/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::get('product/index', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    
});

require __DIR__.'/auth.php';

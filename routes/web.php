<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;

use Illuminate\Support\Facades\Route;

Route::get('/admin',[AdminController::class,'loginAdmin'])->name('login');
Route::post('/admin',[AdminController::class,'postLoginAdmin'])->name('postLoginAdmin');
Route::prefix('/admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/',[CategoryController::class,'index'])->name('categories.index');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/create',[CategoryController::class,'store'])->name('categories.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
        Route::post('/edit/{id}',[CategoryController::class,'update'])->name('categories.update');
        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('categories.delete');
    });
    Route::prefix('menus')->group(function () {
        Route::get('/',[MenuController::class,'index'])->name('menus.index');
        Route::get('/create',[MenuController::class,'create'])->name('menus.create');
        Route::post('/create',[MenuController::class,'store'])->name('menus.store');
        Route::get('/edit/{id}',[MenuController::class,'edit'])->name('menus.edit');
        Route::post('/edit/{id}',[MenuController::class,'update'])->name('menus.update');
        Route::get('/delete/{id}',[MenuController::class,'delete'])->name('menus.delete');
    });
    Route::prefix('/product')->group(function () {
        Route::get('/',[AdminProductController::class,'index'])->name('product.index');
        Route::get('/create',[AdminProductController::class,'create'])->name('product.create');
        Route::post('/create',[AdminProductController::class,'store'])->name('product.store');
        Route::get('/edit/{id}',[AdminProductController::class,'edit'])->name('product.edit');
        Route::post('/edit/{id}',[AdminProductController::class,'update'])->name('product.update');
        Route::get('/delete/{id}',[AdminProductController::class,'delete'])->name('product.delete');
    });
    Route::get('/home', function () {
        return view('backend.home');
    })->name('home');
    
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

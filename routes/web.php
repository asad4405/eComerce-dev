<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/about-us', [FrontendController::class, 'about'])->name('about');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/shop/details/{id}', [FrontendController::class, 'shop_details'])->name('shop.details');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact/post', [FrontendController::class, 'contact_post'])->name('contact.post');


// dashboard //
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');;


// category //
Route::resource('/category', CategoryController::class)->middleware(['auth', 'verified', 'admin.checker']);

// product //
Route::resource('/product', ProductController::class)->middleware(['auth', 'verified', 'admin.checker']);

// attribute //
Route::resource('/attribute',AttributeController::class);
Route::post('/size/store',[AttributeController::class, 'size_store'])->name('size.store');
Route::post('/color/store',[AttributeController::class, 'color_store'])->name('color.store');

// product stock //
Route::resource('/stock',ProductStockController::class);



// profile //
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

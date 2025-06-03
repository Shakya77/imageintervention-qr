<?php

use App\Http\Controllers\ImageGeneratorController;
use App\Http\Controllers\Product\GenerateQRController;
use App\Http\Controllers\Product\ProductController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/image', [ImageGeneratorController::class, 'generate']);
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::post('/generate-qr', [GenerateQRController::class, 'generateQR'])->name('generate.qr');

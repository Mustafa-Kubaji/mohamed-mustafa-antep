<?php

use Illuminate\Support\Facades\Route;

/*
|-------------------------------------------------------------------------
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

Route::get('/master', function () {
    return view('layouts.index-master');
});
//Route::view('/master', 'layouts.index-master');

Route::get('/hakkimde', [\App\Http\Controllers\HomeController::class,'showView']);


Route::get('/urunler', [\App\Http\Controllers\HomeController::class,'showView2']);

//Route::get('/create-product','\App\Http\Controllers\ProductController@create')->name('product.create');
//Route::post('/save-product','\App\Http\Controllers\ProductController@store')->name('product.save');
//Route::get('/show-product','\App\Http\Controllers\ProductController@index')->name('product.index');
//Route::get('/export-products','\App\Http\Controllers\ProductController@export')->name('product.export');

//8 için
Route::get('/export-products', [\App\Http\Controllers\ProductController::class, 'export'])->name('product.export');
Route::get('/show-product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::post('/save-product', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.save');
Route::get('/create-product', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');

Route::get('/show-sliders', [\App\Http\Controllers\SliderController::class, 'index'])->name('sliders.index');
Route::get('/delete-sliders/{id}', [\App\Http\Controllers\SliderController::class, 'destroy'])->name('delete.sliders')->where(array('id'=>'[0-9]+'));

/**
 * Kategori işlemleri
 */
Route::post('/import-categories', [\App\Http\Controllers\CategoryController::class, 'import'])->name('category.import');
Route::get('/upload-categories', [\App\Http\Controllers\CategoryController::class, 'upload'])->name('category.upload');



Route::post('/update-password', [\App\Http\Controllers\SmsController::class, 'update'])->name('password.update');


/**
 * Sms işlemleri
 */
Route::get('/sending', [\App\Http\Controllers\SmsController2::class, 'send']);
Route::post('/send-code', [\App\Http\Controllers\SmsController2::class, 'send_code'])->name('sending.code');

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
    return view('home');
});

Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'show']);

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', [App\Http\Controllers\GalleryController::class, 'index'])->name('Admin');
    Route::get('/admin/gallery/create', [App\Http\Controllers\GalleryController::class, 'create']);
    Route::post('/admin/gallery/store', [App\Http\Controllers\GalleryController::class, 'store']);
    Route::get('/admin/gallery/edit/{id}', [App\Http\Controllers\GalleryController::class, 'edit']);
    Route::put('/admin/gallery/update/{id}', [App\Http\Controllers\GalleryController::class, 'update']);
    Route::get('/admin/gallery/destroy/{id}', [App\Http\Controllers\GalleryController::class, 'destroy']);
    Route::get('/admin/gallery/show/{id}', [App\Http\Controllers\GalleryController::class, 'show']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
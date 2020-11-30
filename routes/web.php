<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AchatController;

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

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create',[ProductController::class, 'create']);
Route::post('/products/update/{id}',[ProductController::class, 'update']);
Route::get('/products/update/{id}',[ProductController::class, 'showData']);
Route::post('/products',[ProductController::class, 'store']);
Route::delete('/products/{id}',[ProductController::class, 'destroy']);

//Commandes Routes

Route::get('/commandes', [CommandeController::class, 'index']);
Route::get('/commandes/create',[CommandeController::class, 'create']);
Route::post('/commandes',[CommandeController::class, 'store']);
Route::post('/commandes/update/{id}',[CommandeController::class, 'update']);
Route::get('/commandes/update/{id}',[CommandeController::class, 'showData']  );
Route::delete('/commandes/{id}',[CommandeController::class, 'destroy']);

//Sales Routes
Route::get('/sales', [AchatController::class, 'index']);
Route::get('/sales/create',[AchatController::class, 'create']);
Route::post('/sales',[AchatController::class, 'store']);
Route::post('/sales/update/{id}',[AchatController::class, 'update']);
Route::get('/sales/update/{id}',[AchatController::class, 'showData']  );
Route::delete('/sales/{id}',[AchatController::class, 'destroy']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

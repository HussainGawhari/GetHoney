<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']); 
Route::get('/',[HomeController::class,'index']);
Route::get('/product',[adminController::class,'product']); 
Route::post('/uploadproduct',[adminController::class,'uploadproduct']); 
Route::get('/showproduct',[adminController::class,'showproduct']); 
Route::get('/deleteproduct/{id}',[adminController::class,'deleteproduct']); 
Route::get('/updateview/{id}',[adminController::class,'updateview']); 
Route::post('/updateproduct/{id}',[adminController::class,'updateproduct']); 
Route::post('/search',[HomeController::class,'search']); 

Route::post('/addcart/{id}',[HomeController::class,'addcart']); 
Route::get('/showcart',[HomeController::class,'showcart']); 
Route::get('/delete/{id}',[HomeController::class,'deletecart']); 

Route::post('/order',[HomeController::class,'confirmOrder']); 

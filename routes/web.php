<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\T_FoodControlller;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/admin', [HomeController::class,'admin'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class,'admin'])->name('home');
    Route::get('/add', [T_FoodControlller::class,'show_form']);
    Route::get('/update', [T_FoodControlller::class,'show_form_update']);
    Route::post('/update', [T_FoodControlller::class,'update_food'])->name('update');
    Route::get('/delete', [T_FoodControlller::class,'delete']);
    Route::post('/new', [T_FoodControlller::class,'add'])->name('new');
});

Route::get('/detail', [T_FoodControlller::class,'index'])->name('detail');


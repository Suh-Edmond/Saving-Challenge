<?php

use Illuminate\Support\Facades\Auth;
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

Route::view("/", "home");
//view all available saving types
Route::get("saving/challenges/", [App\Http\Controllers\SavingTypeController::class, 'index']);
///add a new saving challenge
Route::get("saving/challenges/create", [App\Http\Controllers\SavingTypeController::class, 'create']);
//store a new saving challenge
Route::post("saving/challenges", [App\Http\Controllers\SavingTypeController::class, 'store']);
//add a saving type to my selected saving types
Route::post("saving/challenges/{id}", [App\Http\Controllers\HasSavingTypeController::class, 'store']);
//delete a saving type
Route::delete("saving/get/challenges/{id}/", [App\Http\Controllers\HasSavingTypeController::class, 'destroy']);
//view all selected saving types
Route::get("saving/get/challenges/", [App\Http\Controllers\SavingController::class, 'index']);
//add savings to a saving type
Route::get("saving/get/challenges/{id}/add", [App\Http\Controllers\SavingController::class, 'create']);
//store savings to a saving type
Route::post("saving/get/challenges/{id}", [App\Http\Controllers\SavingController::class, 'store']);
//view all savings for a particular saving type
Route::get("saving/get/challenges/{id}/", [App\Http\Controllers\SavingController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

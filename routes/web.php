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

Route::view("/", "welcome");
//view all available saving types
Route::get("saving/challenges/", [App\Http\Controllers\SavingTypeController::class, 'index'])->middleware('auth');
///add a new saving challenge
Route::get("saving/challenges/create", [App\Http\Controllers\SavingTypeController::class, 'create'])->middleware('auth');;
//store a new saving challenge
Route::post("saving/challenges", [App\Http\Controllers\SavingTypeController::class, 'store'])->middleware('auth');;
//add a saving type to my selected saving types
Route::post("saving/challenges/{id}", [App\Http\Controllers\HasSavingTypeController::class, 'store'])->middleware('auth');;
//delete a saving type
Route::delete("saving/get/challenges/{id}/", [App\Http\Controllers\HasSavingTypeController::class, 'destroy'])->middleware('auth');;
//view all selected saving types
Route::get("saving/get/challenges/", [App\Http\Controllers\SavingController::class, 'index'])->middleware('auth');;
//add savings to a saving type
Route::get("saving/get/challenges/{id}/add", [App\Http\Controllers\SavingController::class, 'create'])->middleware('auth');;
//store savings to a saving type
Route::post("saving/get/challenges/{id}", [App\Http\Controllers\SavingController::class, 'store'])->middleware('auth');;
//view all savings for a particular saving type
Route::get("saving/get/challenges/{id}/", [App\Http\Controllers\SavingController::class, 'show'])->middleware('auth');;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/email_notifications', [App\Http\Controllers\MailController::class, 'SendMail'])->middleware('auth');

Route::get('/user/profile/', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth');

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
//home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//route for email notification
Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'SendNotification'])->middleware('auth');
//route to show a user
Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth');
//route for edit form for user details
Route::get('/user/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->middleware('auth');
//route to update user details
Route::put('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware('auth');

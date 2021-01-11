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
    return view('welcome');
});
Route::get("saving_types", [App\Http\Controllers\SavingTypeController::class, 'index']); //view all available saving types

Route::get("saving_types/create", [App\Http\Controllers\SavingTypeController::class, 'create']); ///form to add a new challenge
Route::post("saving_types", [App\Http\Controllers\SavingTypeController::class, 'store']); ///add a new saving type
Route::get("saving_types/{saving_type}", [App\Http\Controllers\HasSavingsController::class, 'store']); //add a saving type to my selected saving types
Route::get("savings", [App\Http\Controllers\SavingsController::class, 'index']); //view all selected saving types
Route::get("savings/{id}/add", [App\Http\Controllers\SavingsController::class, 'create']); //add saving
Route::post("savings/{id}/", [App\Http\Controllers\SavingsController::class, 'store']); //store savings
Route::get("savings/{id}/", [App\Http\Controllers\SavingsController::class, 'show']); //view all savings for a particular saving type
Route::delete("savings/{id}/", [App\Http\Controllers\SavingsController::class, 'destroy']);

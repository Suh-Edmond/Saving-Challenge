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

Route::middleware('auth')->group(function () {
    Route::get("/", [App\Http\Controllers\HomeController::class, 'index']);
    //view all available saving challenge
    Route::get("/saving/challenges", [App\Http\Controllers\SavingTypeController::class, 'index'])->name('challenges');
    ///add a new saving challenge
    Route::get("/saving/challenges/create", [App\Http\Controllers\SavingTypeController::class, 'create'])->name('challenges_create');
    //store a new saving challenge challenge
    Route::post("/saving/challenges", [App\Http\Controllers\SavingTypeController::class, 'store'])->name('challenges_store');
    //add a saving type to my selected saving challenge
    Route::get("/saving/challenges/selected/{id}", [App\Http\Controllers\HasSavingTypeController::class, 'store'])->name('challenges_add_challenge');
    //view all selected saving challenge
    Route::get("/saving/challenges/selected", [App\Http\Controllers\SavingController::class, 'index'])->name('challenges_get_challenges');
    //add savings to a saving challenge
    Route::get("/saving/challenges/{id}/savings/add/", [App\Http\Controllers\SavingController::class, 'create'])->name('challenges_create_saving');
    //store savings to a saving challenge
    Route::post("/saving/challenges/{id}/savings", [App\Http\Controllers\SavingController::class, 'store'])->name('challenges_store_saving');
    //view all savings for a particular saving challenge
    Route::get("/saving/challenges/{id}/savings", [App\Http\Controllers\SavingController::class, 'show'])->name('challenges_show');
    //route to get completed challenges
    Route::get("/saving/challenges/completed/challenges", [App\Http\Controllers\HomeController::class, 'getDetailCompletedChallenges'])->name('challenges_complete');
    //route to get zero saving challenges
    Route::get("/savings/challenges/zero/challenges", [App\Http\Controllers\HomeController::class, 'ZeroSavedChallenges'])->name('challenges_zero');
    //delete a saving challenge
    Route::delete("/saving/challenges/{id}/", [App\Http\Controllers\HasSavingTypeController::class, 'destroy'])->name('challenges_destroy');

    //home route
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //route to show a user
    Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'show']);
    //route for edit form for user details
    Route::get('/user/profile/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
    //route to update user details
    Route::put('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'update']);

    Route::get('/test', [App\Http\Controllers\AppController::class, 'getNotifyData']);
});
Auth::routes();

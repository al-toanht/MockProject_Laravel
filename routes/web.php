<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('detailscategory/{category}', [HomeController::class, 'showDetailCategories'])->name('home.detailscategory');
Route::resource('home', HomeController::class);
Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::resource('user', UserController::class);
Route::middleware('isLoggedIn')->prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('changepassword', ChangePasswordController::class);
});
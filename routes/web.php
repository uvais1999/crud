<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'viewLogin'])->name('login');
    Route::post('login', [UserController::class, 'login'])->name('post-login');

    Route::get('register', [UserController::class, 'viewRegister'])->name('view-register');

    Route::post('register', [UserController::class, 'register'])->name('register');

});




Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // product
    Route::resource('products', ProductController::class);

    // user
    Route::resource('users', UserController::class);

    // roles
    Route::resource('user-roles', UserRoleController::class);

    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});

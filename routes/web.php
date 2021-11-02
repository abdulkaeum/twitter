<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeConroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TweetController;
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

Route::get('/', [HomeConroller::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name('login.create');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function (){
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::post('tweet', [TweetController::class, 'store'])->name('tweet.store');
});

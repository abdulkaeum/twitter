<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name('login.create');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function (){
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::get('/', [TweetController::class, 'index'])->name('home');
    Route::post('tweet', [TweetController::class, 'store'])->name('tweet.store');

    Route::get('profiles/{user:username}', [ProfileController::class, 'show'])->name('profile');
    Route::get('profiles/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profiles/{user:username}', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('follow/{user}', [FollowController::class, 'store'])->name('follow');
});

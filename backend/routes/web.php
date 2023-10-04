<?php

use App\Http\Controllers\Panel\Article\ArticlesController;
use App\Http\Controllers\Panel\Dashboard\HomepageController;
use App\Http\Controllers\Panel\User\NotificationsController;
use App\Http\Controllers\Panel\User\ProfileController;
use App\Http\Controllers\TwitterAuthController;
use Illuminate\Support\Facades\Route;

Route::get('auth/twitter', [TwitterAuthController::class, 'redirectToTwitter']);
Route::get('auth/twitter/callback', [TwitterAuthController::class, 'handleTwitterCallback']);

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');

    Route::group(['prefix' => '/profile', 'as' => 'users.'], function () {
        Route::get('/', [ProfileController::class, 'profile'])->name('profile');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::group(['prefix' => '/notifications', 'as' => 'notifications.'], function () {
        Route::get('/', [NotificationsController::class, 'index'])->name('index');
        Route::get('/{id}/show', [NotificationsController::class, 'show'])->name('show');
        Route::get('/{id}/destroy', [NotificationsController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '/articles', 'as' => 'articles.'], function () {
        Route::get('/', [ArticlesController::class, 'index'])->name('index');
    });
});

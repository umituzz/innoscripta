<?php

use App\Http\Controllers\Article\ArticlesController;
use App\Http\Controllers\Dashboard\HomepageController;
use App\Http\Controllers\User\NotificationsController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/test', function () {


    dd("here", \Illuminate\Support\Facades\Artisan::call('api:news'));

});

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

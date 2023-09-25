<?php

use App\Http\Controllers\Api\Article\ArticlesController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\User\PreferencesController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'api.'], function () {
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::group(['prefix' => '/articles', 'as' => 'articles.'], function () {
    Route::get('/', [ArticlesController::class, 'index'])->name('index');
    Route::get('/{slug}', [ArticlesController::class, 'detail'])->name('detail');
    Route::get('/preferences', [PreferencesController::class, 'index'])->name('preferences.index');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::group(['prefix' => '/preferences', 'as' => 'preferences.'], function () {
            Route::get('/', [PreferencesController::class, 'userPreferences'])->name('userPreferences');
            Route::get('/source', [PreferencesController::class, 'saveSource'])->name('saveSource');
            Route::get('/category', [PreferencesController::class, 'saveCategory'])->name('saveCategory');
            Route::get('/author', [PreferencesController::class, 'saveAuthor'])->name('saveAuthor');
        });
    });

});

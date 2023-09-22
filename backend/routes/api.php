<?php

use App\Http\Controllers\Api\Article\ArticlesController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Home\InitialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/initial', [InitialController::class, 'index'])->name('index');

Route::group(['prefix' => '/articles', 'as' => 'articles.',], function () {
    Route::get('/', [ArticlesController::class, 'index'])->name('index');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

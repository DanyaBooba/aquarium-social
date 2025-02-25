<?php

use App\Http\Controllers\Api\User\Posts\ApiPostsController;
use App\Http\Controllers\Api\App\Auth\ApiSigninController;
use App\Http\Controllers\Api\User\ApiUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Users

Route::prefix('/')->group(function () {
    Route::get('users', [ApiUserController::class, 'all']);

    Route::prefix('user')->group(function () {
        Route::get('id/{id}', [ApiUserController::class, 'id']);
        Route::get('{nickname}', [ApiUserController::class, 'nickname']);
    });
});

// Posts

Route::prefix('/')->group(function () {
    Route::get('posts', [ApiPostsController::class, 'all']);
    Route::get('posts/{id}', [ApiPostsController::class, 'userposts']);

    Route::prefix('post')->group(function () {
        Route::get('{id}/{idPost}', [ApiPostsController::class, 'post']);
    });
});

// App

Route::prefix('app')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('signin', [ApiSigninController::class, 'signin']);
    });
});

// Fallback

Route::get('/', function () {
    return "{}";
});

Route::fallback(function () {
    return "{}";
});

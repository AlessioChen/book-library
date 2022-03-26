<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserBookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group([
    'prefix' => 'v1',
], function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    //autentificated routes
    Route::group([
        'middleware' => ['auth:sanctum'],
    ], function () {

        Route::get('logout', [AuthController::class, 'logout']);
        Route::apiResources([
            'books' => BookController::class,
            'users.books' => UserBookController::class
        ]);
    });
});

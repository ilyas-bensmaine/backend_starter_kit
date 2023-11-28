<?php

use App\Http\Controllers\Api\Admin\AccountController;
use App\Http\Controllers\Api\Admin\Cities\WilayaController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\UserProfessionController;
use App\Http\Controllers\Api\Admin\UserStatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::domain('admin.app.com')->group(function () {
    Broadcast::routes(['middleware' => ['auth:sanctum']]);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::get('/account/get_notifications', [AccountController::class, 'getNotifications']);

        Route::resource('/cities/wilayas', WilayaController::class);

        Route::resource('/users', UserController::class);
        Route::resource('/user_professions', UserProfessionController::class);
        Route::resource('/user_status', UserStatusController::class);

    });


});



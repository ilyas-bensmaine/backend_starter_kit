<?php

use App\Http\Controllers\Api\User\AccountController;
use App\Http\Controllers\Api\User\CarBrandController;
use App\Http\Controllers\Api\User\CarTypeController;
use App\Http\Controllers\Api\User\PartCategoryController;
use App\Http\Controllers\Api\User\PartSubCategoryController;
use App\Http\Controllers\Api\User\PostController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\User\UserProfessionController;
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
Route::get('/users/notifications', [UserController::class, 'getUserNotifications']);

Route::post('/users/register_validation/step/{step}', [UserController::class, 'registerValidation']);
Route::resource('/users', UserController::class);

Route::get('/user/account/get_notifications', [AccountController::class, 'getNotifications']);

Route::resource('/user_professions', UserProfessionController::class);

Route::resource('/car_brands', CarBrandController::class);
Route::resource('/car_types', CarTypeController::class);

Route::resource('/part_categories', PartCategoryController::class);
Route::resource('/part_sub_categories', PartSubCategoryController::class);
//posts
Route::controller(PostController::class)->group(function () {
    // Route::post('/posts', 'store')->middleware('subscribed:posted-demandes');
    Route::post('/posts', 'store');
    Route::put('/posts/{id}/restore', 'restore');
    Route::get('posts/{id}/mark_as_viewed', 'mark_as_viewed');
    Route::get('posts/{id}/toggle_saved', 'toggle_saved');
    Route::get('posts/{id}/mark_as_saved', 'mark_as_saved');
    Route::get('posts/{id}/mark_as_unsaved', 'mark_as_unsaved');
    Route::get('posts/seen/all', 'viewed_posts');
    Route::get('posts/saved/all', 'saved_posts');
    Route::get('posts/mine/all', 'my_posts');

    // Route::get('posts/mine', 'MyDemandes');
    // Route::get('posts/saved', 'DemandesAime');//('demande.aime');
    // Route::get('posts/responded', 'Demandesrepondue');
});
Route::resource('/posts', PostController::class);

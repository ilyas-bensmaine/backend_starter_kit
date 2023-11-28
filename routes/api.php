<?php

use App\Http\Controllers\Api\FilepondController;
use App\Http\Controllers\Api\SelectableDataController;
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
Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/**Cars && parts**/
Route::get('/selectable_car_types', [SelectableDataController::class, 'getCarType']);
Route::get('/selectable_car_brands', [SelectableDataController::class, 'getCarBrands']);
Route::get('/selectable_part_categories', [SelectableDataController::class, 'getPartCategories']);
Route::get('/selectable_part_sub_categories', [SelectableDataController::class, 'getPartSubCategories']);
/**Users options**/
Route::get('/selectable_user_professions', [SelectableDataController::class, 'getUserProfessions']);
Route::get('/selectable_user_statuses', [SelectableDataController::class, 'getUserStatuses']);
Route::get('/selectable_plans', [SelectableDataController::class, 'getPlans']);
/**Others**/
Route::get('/selectable_wilayas', [SelectableDataController::class, 'getWilayas']);
/**Filepond**/
Route::post('/filepond/process', [FilepondController::class, 'process']);
Route::get('/filepond/load', [FilepondController::class, 'load']);
Route::delete('/filepond/revert', [FilepondController::class, 'revert']);
Route::get('/filepond/remove', [FilepondController::class, 'remove']);

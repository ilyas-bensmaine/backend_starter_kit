<?php

use App\Http\Resources\Backend\Admin\AdminLoginResource;
use App\Http\Resources\Platform\User\UserLoginResource;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return new AdminLoginResource(Admin::findOrFail(1));
});

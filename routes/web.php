<?php

use App\Events\TestEvent;
use App\Http\Resources\Admin\UserResource;
use App\Http\Resources\Backend\Admin\AdminLoginResource;
use App\Http\Resources\Platform\User\UserLoginResource;
use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Faker\Factory as Faker;
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
    $faker = Faker::create();
    $randomNumbers = $faker->unique()->randomElements(range(1, 10), 3);
    return $randomNumbers;
});

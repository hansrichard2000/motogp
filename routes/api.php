<?php

use App\Http\Controllers\Api\Admin\ConstructorController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Http\Request;
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

Route::post('api-register', [RegisterController::class, 'register']);
Route::post('api-login', [LoginController::class, 'login']);
Route::post('api-refresh', [LoginController::class, 'refresh']);
Route::get('redirect', [AuthController::class, 'redirect']);
Route::apiResource('constructors', ConstructorController::class);

Route::group(['middleware' => 'auth:api'], function (){
   Route::apiResource('constructors', ConstructorController::class);
   Route::post('api-logout', [LoginController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

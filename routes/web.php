<?php

use App\Http\Controllers\Web\RiderController;
use App\Http\Controllers\Web\MotoGPController;
use App\Http\Controllers\Web\TeamController;
use App\Http\Controllers\Web\ConstructorController;
use App\Http\Controllers\Web\UserController;
use App\Models\Rider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return redirect()->route('motogp.index');
});

Route::resource('motogp', MotoGPController::class);

Route::resource('rider', RiderController::class);

Route::resource('team', TeamController::class);

Route::resource('constructor', ConstructorController::class);

Route::resource('user', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('author', function () {
    return view('author.index');
});



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\StopWatchController;
use App\Http\Controllers\DiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SampleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/boards', [BoardController::class, 'getIndex']);

Route::get('/stopwatch', [StopWatchController::class, 'getIndex']);

Route::get('/dice', [DiceController::class, 'rollDouble']);

Route::get('/user', [UserController::class, 'getIndex']);

Route::get('/sample/events', [SampleController::class, 'events']);

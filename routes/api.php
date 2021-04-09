<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\smartParkingController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route:get('/entryTime','smartParkingController@enterSlot');
// Route::get('/insert', [smartParkingController::class, 'insert']);
Route::post('/entryTime', [smartParkingController::class, 'enterSlot']);
Route::post('/exitSlot', [smartParkingController::class, 'exitSlot']);
Route::POST('/freeslot', [smartParkingController::class, 'freeslot']);
Route::post('/login', [AuthController::class, 'login']);


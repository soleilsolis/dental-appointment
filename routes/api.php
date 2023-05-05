<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ToothChartController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.session')->group(function() {
    Route::controller(UserController::class)->group(function () {
        Route::post('/user/setup', 'setup');
        Route::post('/user/new', 'store');
        Route::middleware('dentist')->post('/user/update', 'update');
    });

    Route::controller(AppointmentController::class)->group(function () {
        Route::post('/appointments', 'store');
        Route::post('/appointment/get/{id}', 'show');
        Route::post('/appointment/accept/{id}', 'accept');
        Route::post('/appointment/cancel/{id}', 'cancel');
        Route::post('/appointment/addPhoto/{id}', 'addPhoto');
    });

    Route::controller(ServiceController::class)->group(function () {
        Route::post('/services', 'store');
        Route::post('/service/get/{id}', 'show');
        Route::post('/service/update/{id}', 'update');
    });

    Route::controller(ToothChartController::class)->group(function () {
        Route::post('/toothchart/add');
    });
});

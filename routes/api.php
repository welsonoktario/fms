<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DailyMonitoringController;
use App\Http\Controllers\API\DriverController;
use App\Http\Controllers\API\UnitConditionController;
use App\Http\Controllers\API\UnitController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('unit-conditions', [UnitConditionController::class, 'index']);
Route::get('drivers', [DriverController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('profile', [AuthController::class, 'profile']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

    Route::prefix('daily-monitoring-units')->group(function () {
        Route::get('/', [DailyMonitoringController::class, 'index']);
        Route::post('/', [DailyMonitoringController::class, 'store']);
        Route::get('{dailyMonitoringUnit}', [DailyMonitoringController::class, 'show']);
    });

    Route::prefix('units')->group(function () {
        Route::get('/', [UnitController::class, 'index']);
        Route::get('{id}', [UnitController::class, 'show']);
    });
});

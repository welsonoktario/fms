<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MaintenanceTypeController;
use App\Http\Controllers\MechanicController;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
});
Route::resource('projects', ProjectController::class);
Route::resource('maintenance-types', MaintenanceTypeController::class);
Route::resource('units', UnitController::class);
Route::resource('drivers', DriverController::class);
Route::resource('mechanics', MechanicController::class);

require __DIR__.'/auth.php';

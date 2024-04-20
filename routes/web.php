<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MaintenanceTypeController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SubmissionController;

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
Route::resource('suppliers', SupplierController::class);
Route::resource('spareparts', SparepartController::class);
Route::resource('submissions', SubmissionController::class);


require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController as thisProjectController;
use App\Http\Controllers\UnitController as thisUnitController;
use App\Http\Controllers\DriverController as thisDriverController;
use App\Http\Controllers\MechanicController as thisMechanicController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('projects', thisProjectController::class);
Route::resource('units', thisUnitController::class);
Route::resource('drivers', thisDriverController::class);
Route::resource('mechanics', thisMechanicController::class);

require __DIR__.'/auth.php';

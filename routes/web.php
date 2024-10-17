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
use App\Http\Controllers\SparepartCategorieController;
use App\Http\Controllers\SparepartBrandController;
use App\Http\Controllers\DailyMonitoringUnits;


Route::middleware('auth')->group(
    function () {
        Route::get('/', function () {
            return view('welcome');
        })->name('dashboard');
        Route::resource('projects', ProjectController::class);
        Route::resource('maintenance-types', MaintenanceTypeController::class);
        Route::resource('units', UnitController::class);
        Route::resource('drivers', DriverController::class);
        Route::resource('mechanics', MechanicController::class);
        Route::resource('suppliers', SupplierController::class);
        Route::resource('spareparts', SparepartController::class);
        Route::resource('submissions', SubmissionController::class);
        Route::resource('sparepart_categories', SparepartCategorieController::class);
        Route::resource('sparepart_brands', SparepartBrandController::class);
        Route::resource('dailymonitoringunits', DailyMonitoringUnits::class);
        Route::get('qrcode/{asset_code}', [UnitController::class, 'generate2'])->name('generate2');
        Route::get('qrcodedriver/{nik}', [DriverController::class, 'gendriver'])->name('gendriver');
        Route::get('/units/detail/{asset_code}', [UnitController::class, 'show'])->name('show');
    }
);
Route::get('/driver/detail/{nik}', [DriverController::class, 'show'])->name('showqr');



require __DIR__ . '/auth.php';

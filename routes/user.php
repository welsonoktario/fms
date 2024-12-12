<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Middleware\IsUser;

// tambah route buat role User disini
// harus ada ->name()
// jangan lupa '->defaults('label', 'Label Sidebar')' untuk penamaan menu di sidebar user
Route::group(['prefix' => 'user', 'middleware' => [IsUser::class], 'as' => 'user.'], function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->defaults('label', 'Dashboard');
});

<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

/**
 * Backend Controllers
 */

Route::prefix('admin')->name('backend.')->middleware('verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
});

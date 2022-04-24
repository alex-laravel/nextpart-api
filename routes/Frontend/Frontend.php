<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Controllers
 */

Route::name('frontend.')->middleware('verified')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});

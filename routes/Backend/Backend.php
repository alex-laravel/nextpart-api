<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

/**
 * Backend Controllers
 */

Route::get('/', [DashboardController::class, 'index'])->name('index');

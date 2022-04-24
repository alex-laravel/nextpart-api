<?php

/**
 * Auth Controllers
 */
Route::prefix('auth')->group(function () {
    Auth::routes(['register' => config('auth.registration_enabled'), 'verify' => true]);
});

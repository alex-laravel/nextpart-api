<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Auth Routes
 */
Route::group([], function () {
    includeRouteFiles(__DIR__ . '/Auth/');
});

/*
 * Frontend Routes
 */
Route::group(['namespace' => 'Frontend'], function () {
    includeRouteFiles(__DIR__ . '/Frontend/');
});

/*
 * Backend Routes
 */
Route::group(['namespace' => 'Backend'], function () {
    includeRouteFiles(__DIR__ . '/Backend/');
});

/*
 * Locale Routes
 */
Route::group(['namespace' => 'Locale'], function () {
    includeRouteFiles(__DIR__ . '/Locale/');
});

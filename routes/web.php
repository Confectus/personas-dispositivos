<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        // props
    ]);
});

Route::resource('people', PersonController::class)
    ->only('index', 'store', 'update', 'destroy');

Route::resource('device', DeviceController::class)
    ->only('index');

require __DIR__.'/auth.php';

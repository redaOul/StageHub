<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\StageController;
use \App\Http\Controllers\DemandeController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProjetController;
use \App\Http\Controllers\DomaineController;
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

Route::middleware(['auth'])->group(function() {

    Route::get('/', function () {
        return view('index');
    });

    Route::get('/home', HomeController::class)->name('home');

    Route::resource('/stage', StageController::class);

    Route::resource('/demande', DemandeController::class);

    Route::resource('/users', UserController::class);

    Route::resource('/projets', ProjetController::class);

    Route::resource('/domaines', DomaineController::class);
});

require __DIR__.'/auth.php';

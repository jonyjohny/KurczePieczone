<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AviaryController;
use App\Http\Controllers\BreedingController;
use App\Http\Controllers\IncubationController;
use App\Http\Controllers\AviaryplaceController;
use App\Http\Controllers\ReproductionController;
use App\Http\Controllers\BreedingplaceController;
use App\Http\Controllers\ReproductionrowController;
use App\Http\Controllers\IncubationincubatorController;

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
    return view('welcome');
});

Route::resource('users', UserController::class)->only([
    'index', 'create', 'edit'
]);

Route::resource('reproductions', ReproductionController::class)->only([
    'index', 'create', 'edit'
]);

Route::resource('incubations', IncubationController::class)->only([
    'index', 'create', 'edit'
]);

Route::resource('breeding', BreedingController::class)->only([
    'index', 'create', 'edit'
]);

Route::resource('aviaries', AviaryController::class)->only([
    'index', 'create', 'edit'
]);

Route::resource('reproductionrows', ReproductionrowController::class)->only([
    'index', 'create', 'edit'
]);

Route::resource('incubationincubators', IncubationincubatorController::class)->only([
    'index', 'create', 'edit'
]);

Route::resource('breedingplaces', BreedingplaceController::class)->only([
    'index', 'create', 'edit'
]);

Route::resource('aviaryplaces', AviaryplaceController::class)->only([
    'index', 'create', 'edit'
]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

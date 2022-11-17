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

Route::get('/users/allOpen', [UserController::class, 'allOpen'])->name('users.allOpen');

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

Route::get('/reproductionrows/create/{reproduction}', [ReproductionrowController::class, 'create'])->name('reproductionrows.create');

Route::resource('reproductionrows', ReproductionrowController::class)->only([
    'edit'
]);

Route::get('/reproductionrows/{reproduction}', [ReproductionrowController::class, 'index'])->name('reproductionrows.index');

Route::get('/incubationincubators/create/{incubation}', [IncubationincubatorController::class, 'create'])->name('incubationincubators.create');

Route::resource('incubationincubators', IncubationincubatorController::class)->only([
    'edit'
]);

Route::get('/incubationincubators/{incubation}', [IncubationincubatorController::class, 'index'])->name('incubationincubators.index');

Route::get('/breedingplaces/create/{breeding}', [BreedingplaceController::class, 'create'])->name('breedingplaces.create');

Route::resource('breedingplaces', BreedingplaceController::class)->only([
    'edit'
]);

Route::get('/breedingplaces/{breeding}', [BreedingplaceController::class, 'index'])->name('breedingplaces.index');

Route::get('/aviaryplaces/create/{aviary}', [AviaryplaceController::class, 'create'])->name('aviaryplaces.create');

Route::resource('aviaryplaces', AviaryplaceController::class)->only([
    'edit'
]);

Route::get('/aviaryplaces/{aviary}', [AviaryplaceController::class, 'index'])->name('aviaryplaces.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

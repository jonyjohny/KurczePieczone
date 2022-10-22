<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AviaryController;
use App\Http\Controllers\BreedingController;
use App\Http\Controllers\IncubationController;
use App\Http\Controllers\ReproductionController;

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
    //dd(config('auth.roles.boss'));
});


Route::name('users.')->prefix('users')->group(function () {
    Route::get('',[UserController::class, 'index'])
        ->name('index')
        ->middleware(['permission:users.index']);
        Route::get('create',[UserController::class, 'create'])
        ->name('create')
        ->middleware(['permission:users.index']);
        Route::get('edit',[UserController::class, 'edit'])
        ->name('edit')
        ->middleware(['permission:users.index']);
});

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

<?php

use App\Http\Controllers\AviaryController;
use App\Http\Controllers\AviaryplaceController;
use App\Http\Controllers\AviaryReportController;
use App\Http\Controllers\BreedingController;
use App\Http\Controllers\BreedingplaceController;
use App\Http\Controllers\BreedingReportController;
use App\Http\Controllers\IncubationController;
use App\Http\Controllers\IncubationincubatorController;
use App\Http\Controllers\IncubationReportController;
use App\Http\Controllers\ReproductionController;
use App\Http\Controllers\ReproductionReportController;
use App\Http\Controllers\ReproductionrowcagesController;
use App\Http\Controllers\ReproductionrowController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/allOpen', [UserController::class, 'allOpen'])->name('users.allOpen');
Route::get('/users/allRoles', [UserController::class, 'allRoles'])->name('users.allRoles');

Route::resource('users', UserController::class)->only([
    'index', 'create', 'edit',
]);

Route::resource('reproductions', ReproductionController::class)->only([
    'index', 'create', 'edit',
]);

Route::resource('incubations', IncubationController::class)->only([
    'index', 'create', 'edit',
]);

Route::resource('breeding', BreedingController::class)->only([
    'index', 'create', 'edit',
]);

Route::resource('aviaries', AviaryController::class)->only([
    'index', 'create', 'edit',
]);

Route::get('/reproductionrows/chart/hens/{reproductionrowcages}', [ReproductionrowController::class, 'hens'])->name('reproductionrows.hens');
Route::get('/reproductionrows/chart/roosters/{reproductionrowcages}', [ReproductionrowController::class, 'roosters'])->name('reproductionrows.roosters');
Route::get('/reproductionrows/chart/{reproduction}', [ReproductionrowController::class, 'chart'])->name('reproductionrows.chart');
Route::get('/reproductionrows/create/{reproduction}', [ReproductionrowController::class, 'create'])->name('reproductionrows.create');
Route::resource('reproductionrows', ReproductionrowController::class)->only([
    'edit',
]);
Route::get('/reproductionrows/{reproduction}', [ReproductionrowController::class, 'index'])->name('reproductionrows.index');

Route::get('/incubationincubators/create/{incubation}', [IncubationincubatorController::class, 'create'])->name('incubationincubators.create');
Route::resource('incubationincubators', IncubationincubatorController::class)->only([
    'edit',
]);
Route::get('/incubationincubators/{incubation}', [IncubationincubatorController::class, 'index'])->name('incubationincubators.index');

Route::get('/breedingplaces/create/{breeding}', [BreedingplaceController::class, 'create'])->name('breedingplaces.create');
Route::resource('breedingplaces', BreedingplaceController::class)->only([
    'edit',
]);
Route::get('/breedingplaces/{breeding}', [BreedingplaceController::class, 'index'])->name('breedingplaces.index');

Route::get('/aviaryplaces/create/{aviary}', [AviaryplaceController::class, 'create'])->name('aviaryplaces.create');
Route::resource('aviaryplaces', AviaryplaceController::class)->only([
    'edit',
]);
Route::get('/aviaryplaces/{aviary}', [AviaryplaceController::class, 'index'])->name('aviaryplaces.index');

Route::get('/reproductionreport/{reproductionrowcage}', [ReproductionReportController::class, 'index'])->name('reproductionreport.index');
Route::get('/reproductionreport/reportherd/{reproduction}', [ReproductionReportController::class, 'report'])->name('reproductionreport.report');
Route::get('/reproductionreport/reportrow/{reproductionrow}', [ReproductionReportController::class, 'reportrow'])->name('reproductionreport.reportrow');
Route::get('/reproductionreport/create/{reproductionrowcage}', [ReproductionReportController::class, 'create'])->name('reproductionreport.create');
Route::resource('reproductionreport', ReproductionReportController::class)->only([
    'edit',
]);

Route::get('/reproductionrowcages/create/{reproductionrow}', [ReproductionrowcagesController::class, 'create'])->name('reproductionrowcages.create');
Route::resource('reproductionrowcages', ReproductionrowcagesController::class)->only([
    'edit',
]);
Route::get('/reproductionrowcages/{reproductionrow}', [ReproductionrowcagesController::class, 'index'])->name('reproductionrowcages.index');

Route::get('/incubationreport/report/{incubation}', [IncubationReportController::class, 'report'])->name('incubationreport.report');
Route::get('/incubationreport/create/{incubationincubator}', [IncubationReportController::class, 'create'])->name('incubationreport.create');
Route::resource('incubationreport', IncubationReportController::class)->only([
    'edit',
]);
Route::get('/incubationreport/{incubationincubator}', [IncubationReportController::class, 'index'])->name('incubationreport.index');

Route::get('/breedingreport/report/{breeding}', [BreedingReportController::class, 'report'])->name('breedingreport.report');
Route::get('/breedingreport/create/{breedingplace}', [BreedingReportController::class, 'create'])->name('breedingreport.create');
Route::resource('breedingreport', BreedingReportController::class)->only([
    'edit',
]);
Route::get('/breedingreport/{breedingplace}', [BreedingReportController::class, 'index'])->name('breedingreport.index');

Route::get('/aviaryreport/report/{aviary}', [AviaryReportController::class, 'report'])->name('aviaryreport.report');
Route::get('/aviaryreport/create/{aviaryplace}', [AviaryReportController::class, 'create'])->name('aviaryreport.create');
Route::resource('aviaryreport', AviaryReportController::class)->only([
    'edit',
]);
Route::get('/aviaryreport/{aviaryplace}', [AviaryReportController::class, 'index'])->name('aviaryreport.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/change-language/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\EditUserController;

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



Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'init'])->name('dashboard');

    Route::get('/collectData', function () { return view('collectData'); })->name('collectData');
    Route::post('/collectData', [CalculationsController::class, 'collectData'])->name('collectData');

    Route::get('/addMeal', function () { return view('addMeal'); })->name('addMeal');
    Route::post('/addMeal', [MealController::class, 'addMeal'])->name('addMeal');

    Route::get('/savedMeals', [MealController::class, 'savedMeals'])->name('savedMeals');
    Route::post('/addSavedConsumption', [MealController::class, 'addSavedConsumption'])->name('addSavedConsumption');
    Route::post('/removeSavedMeal', [MealController::class, 'removeSavedMeal'])->name('removeSavedMeal');

    Route::get('/changePass', function () { return view('changePass'); })->name('changePass');
    Route::post('/changePass', [EditUserController::class, 'changePass'])->name('changePass');

    });

require __DIR__.'/auth.php';

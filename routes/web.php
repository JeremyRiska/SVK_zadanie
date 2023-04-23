<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/spa/{any?}', function () {
    return view('welcome');
})->where('any', '.*');

// Route::get('/countries/{any?}', [CountryController::class , 'index'])->where('any', '.*');
Route::get('/api/get-countries/{order}/{searchQuery}',  [CountryController::class , 'index']);
Route::get('/api/get-continents', [CountryController::class, 'allContinents']);
Route::post('/api/save-country', [CountryController::class, 'saveCountry']);
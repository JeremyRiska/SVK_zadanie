<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/get-countries/{order}/{searchQuery}',  [CountryController::class , 'index']);
Route::get('/get-countries',  [CountryController::class , 'index']);
Route::get('/get-continents', [CountryController::class, 'allContinents']);
Route::post('/save-country', [CountryController::class, 'saveCountry']);
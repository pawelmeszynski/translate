<?php

use App\Http\Controllers\TranslateRequestController;
use App\Models\TranslatedCountries;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/fetch-countries', function () {
    dump(Artisan::call('countries:fetch'));
});
Route::get('/fetch-states', function () {
    dump(Artisan::call('states:fetch'));
});
Route::get('/fetch-types', function () {
    dump(Artisan::call('types:fetch'));
});

Route::get('/translate-states', function () {
    dump(Artisan::call('names:translate'));
});

Route::get('/take', [TranslateRequestController::class, 'take']);

Route::post('/take', [TranslateRequestController::class, 'post']);


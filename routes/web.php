<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompositionController;

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

Route::get('/', function () {
    return view('app');
});

Route::post('/registration', [RegistrationController::class, 'new_registration']);
Route::get('/regAdmin', [RegistrationController::class, 'reg_admin']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/downloadComposition', [CompositionController::class, 'download_composition', function(Request $request){}]);

Route::get('/{vue_capture?}', function () {
    return view('app');
})->where('vue_capture', '[\/\w\.-]*');

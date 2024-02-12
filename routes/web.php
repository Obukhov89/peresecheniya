<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompositionController;
use App\Http\Controllers\ContestController;

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
Route::get('get_turn_request', [RegistrationController::class, 'get_turn_request']);
Route::post('/request_accept', [RegistrationController::class, 'save_user']);
Route::post('/request_reject', [RegistrationController::class, 'delete_request']);

Route::post('/login', [UserController::class, 'login']);
Route::post('/load_avatar', [UserController::class, 'load_avatar']);
Route::get('/getUserList', [UserController::class, 'getAllUsers']);

Route::controller(CompositionController::class)->group(function () {
    Route::post('/downloadComposition', 'download_composition');
    Route::post('/get_compositions', 'get_composition_author');
    Route::post('/get_composition', 'getArticle');
    Route::post('/edit_composition', 'editComposition');
    Route::post('/delete_text', 'delete_text');
    Route::post('/delete_audio', 'delete_audio');
    Route::post('/get_names_compositions', 'get_names_compositions');
    Route::post('/getAudioComposition', 'getAudioComposition');

});

Route::controller(ContestController::class)->group(function () {
   Route::get('/get_list_contests', 'get_all_contests');
   Route::post('/save_contest_with_text', 'save_new_contest_text');
   Route::post('/save_contest_with_file', 'save_new_contest_file');
   Route::post('/get_info_contest', 'get_contest_item');
   Route::post('/accept_judge', 'accept_judge');
   Route::post('/get_judges', 'get_judges_contest');
   Route::post('/new_composition_to_contest', 'newCompositionToContest');
   Route::post('/postCompositionToContest', 'postCompositionToContest');
   Route::post('/getContestParticipantsList', 'getContestParticipantsList');
   Route::get('/getJudgeNewContest', 'getJudgeContest');
});


Route::get('/{vue_capture?}', function () {
    return view('app');
})->where('vue_capture', '[\/\w\.-]*');

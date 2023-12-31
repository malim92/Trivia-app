<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TriviaController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [TriviaController::class, 'index']);
// Route::post('/submit', 'TriviaController@submit');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/questions', [TriviaController::class, 'fetchQuestions'])->name('questions.index');

Route::post('/fetch-questions', [TriviaController::class, 'fetchQuestions'])->name('trivia.fetchQuestions');

//not used
Route::post('/submit-form', [TriviaController::class, 'submitForm'])->name('submitForm');

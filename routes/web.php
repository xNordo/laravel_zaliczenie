<?php

use App\Http\Controllers\EducationHistoryController;
use App\Http\Controllers\PractitionerController;
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
Route::redirect('/', '/practitioners');

Route::resource('practitioners', PractitionerController::class);

Route::resource('practitioners.education_histories', EducationHistoryController::class)
    ->except(['show', 'index']);

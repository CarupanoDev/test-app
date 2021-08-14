<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradePostController;
use App\Http\Controllers\GradePutController;
use App\Http\Controllers\GradeGetController;
use App\Http\Controllers\GradeDeleteController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/grades', GradePostController::class);
Route::put('/grades/{id}', GradePutController::class);
Route::get('/grades', GradeGetController::class);
Route::delete('/grades/{id}', GradeDeleteController::class);

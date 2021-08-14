<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradePostController;
use App\Http\Controllers\GradeDeleteController;
use App\Http\Controllers\GradePutController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('grade', GradePostController::class);
Route::put('grade/{id}', GradePutController::class);
Route::delete('grade/{id}',GradeDeleteController::class);


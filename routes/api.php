<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('add-student',[\App\Http\Controllers\Api\StudentController::class,'store']);
Route::get('students',[\App\Http\Controllers\Api\StudentController::class,'index']);
Route::get('edit-student/{id}',[\App\Http\Controllers\Api\StudentController::class,'edit']);
Route::put('edit-student/{id}',[\App\Http\Controllers\Api\StudentController::class,'update']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

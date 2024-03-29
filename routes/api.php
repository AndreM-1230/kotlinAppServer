<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
//Route::put('/users/{user}', 'UserController@update');
//Route::delete('/users/{user}', 'UserController@destroy');

Route::get('/registration/has-user', [RegistrationController::class, 'hasUser']);
Route::get('/registration/get-data', [RegistrationController::class, 'send']);
Route::post('/registration/create-user', [RegistrationController::class, 'store']);

<?php

use App\Http\Controllers\UsuarioController;
use App\Modules\Auth\Adapters\Http\Controllers\AuthController;
use App\Modules\Turmas\Adapters\Http\Controllers\TurmaController;
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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
});

Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'usuarios'
], function ($router) {
    Route::patch('/redefinir-senha', [UsuarioController::class, 'redefinirPassword']);
});



Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'turmas'
], function ($router) {
    Route::get('/', [TurmaController::class, 'index']);
});

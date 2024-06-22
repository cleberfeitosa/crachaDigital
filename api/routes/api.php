<?php

use App\Modules\Auth\Adapters\Http\Controllers\AuthController;
use App\Modules\Discentes\Adapters\Http\Controllers\DiscenteController;
use App\Modules\Discentes\Adapters\Http\Controllers\LiberacaoDiscenteController;
use App\Modules\Turmas\Adapters\Http\Controllers\TurmaController;
use App\Modules\Usuarios\Adapters\Http\Controllers\UsuarioController;
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
});

Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'usuarios'
], function ($router) {
    Route::patch('/alterar-senha', [UsuarioController::class, 'alterarSenha']);
});



Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'turmas'
], function ($router) {
    Route::get('/', [TurmaController::class, 'index']);
    Route::get('/{id}', [TurmaController::class, 'show']);
    Route::post('/{id}/liberacao', [TurmaController::class, 'createLiberacaoTurma']);
});

Route::group([
    'middleware' => ['jwt.auth', 'role.coordenador'],
    'prefix' => 'discentes'
], function ($router) {
    Route::get('/', [DiscenteController::class, 'index']);
    Route::get('/{id}', [DiscenteController::class, 'show']);
});

Route::group([
    'middleware' => ['jwt.auth', 'role.coordenador_ou_vigilante'],
    'prefix' => 'discentes/liberacoes'
], function ($router) {
    Route::post('/', [LiberacaoDiscenteController::class, 'createLiberacoesDiscentes']);
    Route::get('/verificar', [LiberacaoDiscenteController::class, 'verificarSeDiscenteEstaLiberado']);
});

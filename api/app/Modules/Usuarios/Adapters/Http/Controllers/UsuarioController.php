<?php

namespace App\Modules\Usuarios\Adapters\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Application\Utils\ExceptionHandler;
use App\Modules\Usuarios\Application\UseCases\AlterarSenhaUseCase;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function __construct(protected AlterarSenhaUseCase $alterarSenhaUseCase)
    {
    }

    public function alterarSenha(Request $request)
    {
        try {
            $usuarioId = $request->user()->id;

            $senha = $request->input('password');

            $this->alterarSenhaUseCase->run($usuarioId, $senha);

            return response()->noContent();
        } catch (\Throwable $th) {
            $formatedException = ExceptionHandler::format($th);

            return response()->json($formatedException, $formatedException['code']);
        }
    }
}

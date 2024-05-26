<?php

namespace App\Modules\Auth\Adapters\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Auth\Adapters\Mappers\UsuarioAuthenticatedMapper;
use App\Modules\Auth\Application\UseCases\AuthenticateUseCase;
use App\Modules\Common\Application\Utils\ExceptionHandler;

class AuthController extends Controller
{

    public function __construct(
        protected AuthenticateUseCase $authenticateUseCase
    ) {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        try {
            $matricula = $request->input('matricula');
            $password = $request->input('password');

            $suarioAuthenticatedDto = $this->authenticateUseCase->run($matricula, $password);

            return UsuarioAuthenticatedMapper::fromDtoToMap($suarioAuthenticatedDto);
        } catch (\Throwable $th) {
            $formatedException = ExceptionHandler::format($th);

            return response()->json($formatedException, $formatedException['code']);
        }
    }
}

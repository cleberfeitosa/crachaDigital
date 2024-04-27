<?php

namespace App\Modules\Auth\Application\UseCases;

use App\Modules\Auth\Application\Dtos\UsuarioAuthenticatedDto;
use App\Modules\Auth\Core\Exceptions\UsuarioNotIsAuthenticatedException;
use App\Modules\Usuarios\Application\Services\UsuarioService;
use Illuminate\Support\Facades\Auth;

class AuthenticateUseCase
{
    public function __construct(protected UsuarioService $usuarioService)
    {
    }

    public function run($matricula, $password): UsuarioAuthenticatedDto
    {
        $token = Auth::attempt(['matricula' => $matricula, 'password' => $password]);

        if (!$token) {
            throw UsuarioNotIsAuthenticatedException::newException();
        }

        $usuario = Auth::getUser();

        $usuarioAuthenticated = new UsuarioAuthenticatedDto();
        $usuarioAuthenticated->token = $token;
        $usuarioAuthenticated->usuario = $usuario;

        return $usuarioAuthenticated;
    }
}

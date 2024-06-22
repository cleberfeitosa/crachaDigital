<?php

namespace App\Modules\Auth\Application\UseCases;

use App\Modules\Auth\Core\Exceptions\UsuarioNotAllowedException;
use App\Modules\Usuarios\Core\Entities\Usuario;
use Illuminate\Support\Facades\Log;

class ValidateRoleUseCase
{
    public function run(Usuario $usuario, array $roles): void
    {
        $roleIsValid = in_array($usuario->papel, $roles);
        Log::debug($usuario->papel);
        Log::debug($roles);
        if (!$roleIsValid) {
            throw UsuarioNotAllowedException::newException();
        }
    }
}

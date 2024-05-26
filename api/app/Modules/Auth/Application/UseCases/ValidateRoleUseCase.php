<?php

namespace App\Modules\Auth\Application\UseCases;

use App\Modules\Auth\Core\Exceptions\UsuarioNotAllowedException;
use App\Modules\Usuarios\Core\Entities\Usuario;

class ValidateRoleUseCase
{
    public function run(Usuario $usuario, string $role): void
    {
        $roleIsValid = $usuario->papel === $role;

        if (!$roleIsValid) {
            throw UsuarioNotAllowedException::newException();
        }
    }
}

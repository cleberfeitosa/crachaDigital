<?php

namespace App\Modules\Usuarios\Application\Services;

use App\Modules\Usuarios\Adapters\Database\UsuarioRepositoryImpl;
use App\Modules\Usuarios\Core\Entities\Usuario;
use App\Modules\Usuarios\Core\Exceptions\UsuarioNotExistsException;

class UsuarioService
{
    public function __construct(
        protected UsuarioRepositoryImpl $turmaRepository
    ) {
    }

    public function findById($usuarioId): Usuario
    {
        $usuario = $this->turmaRepository->findUsuarioById($usuarioId);

        if (!$usuario) {
            throw UsuarioNotExistsException::newException();
        }

        return $usuario;
    }
}

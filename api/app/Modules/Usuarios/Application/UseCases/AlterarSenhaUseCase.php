<?php

namespace App\Modules\Usuarios\Application\UseCases;

use App\Modules\Usuarios\Adapters\Database\UsuarioRepositoryImpl;
use App\Modules\Usuarios\Application\Services\UsuarioService;

class AlterarSenhaUseCase
{

    public function __construct(protected UsuarioService $usuarioService, protected UsuarioRepositoryImpl $usuarioRepositoryImpl)
    {
    }

    /**
     * @param string $usarioId
     * @param string $senha
     */
    function run($usarioId, $senha)
    {
        $usuario = $this->usuarioService->findById($usarioId);

        $usuario->alterarSenha($senha);

        $this->usuarioRepositoryImpl->save($usuario);
    }
}

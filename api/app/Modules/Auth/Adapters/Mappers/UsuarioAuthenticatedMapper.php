<?php

namespace App\Modules\Auth\Adapters\Mappers;

use App\Modules\Auth\Application\Dtos\UsuarioAuthenticatedDto;

class UsuarioAuthenticatedMapper
{
    static function fromDtoToMap(UsuarioAuthenticatedDto $usuarioAuthenticatedDto)
    {
        return [
            'token' => $usuarioAuthenticatedDto->token,
            'usuario' => [
                'id' => $usuarioAuthenticatedDto->usuario->id,
                'nome' => $usuarioAuthenticatedDto->usuario->nome,
                'matricula' => $usuarioAuthenticatedDto->usuario->matricula,
                'papel' => $usuarioAuthenticatedDto->usuario->papel,
                'primeiroAcesso' => $usuarioAuthenticatedDto->usuario->primeiro_acesso,
            ]
        ];
    }
}

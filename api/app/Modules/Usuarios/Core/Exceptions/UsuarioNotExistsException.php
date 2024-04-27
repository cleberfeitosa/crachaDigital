<?php

namespace App\Modules\Usuarios\Core\Exceptions;

use Exception;

class UsuarioNotExistsException extends Exception
{
    public function __construct()
    {
        parent::__construct('O usuário informado não existe no banco de dados', 404);
    }

    static public function newException()
    {
        return new UsuarioNotExistsException();
    }
}

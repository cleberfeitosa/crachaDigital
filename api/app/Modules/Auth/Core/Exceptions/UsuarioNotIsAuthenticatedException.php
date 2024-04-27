<?php

namespace App\Modules\Auth\Core\Exceptions;

use Exception;

class UsuarioNotIsAuthenticatedException extends Exception
{
    public function __construct()
    {
        parent::__construct('O usuário não está autenticado', 401);
    }

    static public function newException()
    {
        return new UsuarioNotIsAuthenticatedException();
    }
}

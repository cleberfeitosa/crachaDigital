<?php

namespace App\Modules\Auth\Core\Exceptions;

use Exception;

class UsuarioNotAllowedException extends Exception
{
    public function __construct()
    {
        parent::__construct('O usuário não tem permissão.', 403);
    }

    static public function newException()
    {
        return new UsuarioNotAllowedException();
    }
}

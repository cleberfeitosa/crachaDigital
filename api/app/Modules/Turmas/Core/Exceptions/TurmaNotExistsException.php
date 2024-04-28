<?php

namespace App\Modules\Turmas\Core\Exceptions;

use Exception;

class TurmaNotExistsException extends Exception
{
    public function __construct()
    {
        parent::__construct('A turma informada não existe no banco de dados', 404);
    }

    static public function newException()
    {
        return new TurmaNotExistsException();
    }
}

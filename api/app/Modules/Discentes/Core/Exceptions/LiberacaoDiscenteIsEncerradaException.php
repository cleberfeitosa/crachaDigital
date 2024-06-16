<?php

namespace App\Modules\Discentes\Core\Exceptions;

use Exception;

class LiberacaoDiscenteIsEncerradaException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 409);
    }

    static public function newError()
    {
        return new LiberacaoDiscenteIsEncerradaException("A liberação de discente já está encerrada.");
    }
}

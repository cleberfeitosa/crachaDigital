<?php

namespace App\Modules\Discentes\Core\Exceptions;

use Exception;

class LiberacaoDiscenteIsConcluidoException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 409);
    }

    static public function newError()
    {
        return new LiberacaoDiscenteIsConcluidoException("A liberação de discente está concluída.");
    }
}

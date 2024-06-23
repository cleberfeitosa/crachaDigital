<?php

namespace App\Modules\Discentes\Core\Exceptions;

use Exception;

class LiberacaoDiscenteIsNotAtivaException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 409);
    }

    static public function newError()
    {
        return new LiberacaoDiscenteIsNotAtivaException("A liberação de discente não está ativa.");
    }
}

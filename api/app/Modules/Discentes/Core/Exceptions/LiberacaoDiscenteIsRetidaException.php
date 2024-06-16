<?php

namespace App\Modules\Discentes\Core\Exceptions;

use Exception;

class LiberacaoDiscenteIsRetidaException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 409);
    }

    static public function newError()
    {
        return new LiberacaoDiscenteIsRetidaException("A liberação de discente está retida.");
    }
}

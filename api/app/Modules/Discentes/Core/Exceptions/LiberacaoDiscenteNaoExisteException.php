<?php

namespace App\Modules\Discentes\Core\Exceptions;

use Exception;

class LiberacaoDiscenteNaoExisteException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 409);
    }

    static public function fromId(int $liberacaoDiscenteId)
    {
        return new LiberacaoDiscenteNaoExisteException("O ID '$liberacaoDiscenteId' de liberação de discente informado não existe.");
    }
}

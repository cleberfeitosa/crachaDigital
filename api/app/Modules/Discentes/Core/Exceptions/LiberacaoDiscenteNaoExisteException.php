<?php

namespace App\Modules\Discentes\Core\Exceptions;

use Exception;

class LiberacaoDiscenteNaoExisteException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 404);
    }

    static public function fromId(string $liberacaoDiscenteId)
    {
        return new LiberacaoDiscenteNaoExisteException("O ID '$liberacaoDiscenteId' de liberação de discente informado não existe.");
    }


    static public function fromDiscenteId(string $discenteId)
    {
        return new LiberacaoDiscenteNaoExisteException("O ID '$discenteId' de discente informado não possui liberação.");
    }
}

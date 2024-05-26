<?php

namespace App\Modules\Discentes\Core\Exceptions;

use Exception;

class LiberacaoDiscenteIsAtivaException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 409);
    }

    static public function fromDiscentesIds(array $discentesIds)
    {
        $ids = implode(', ', $discentesIds);

        if (count($discentesIds) > 1) {
            $message = "Os IDs {'$ids'} de discentes informados possuem liberações ativas.";
        } else {
            $message = "O ID {'$ids'} de discente informado possui liberação ativa.";
        }

        return new LiberacaoDiscenteIsAtivaException($message);
    }
}

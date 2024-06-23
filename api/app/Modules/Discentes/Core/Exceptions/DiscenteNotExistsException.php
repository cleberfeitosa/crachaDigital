<?php

namespace App\Modules\Discentes\Core\Exceptions;

use Exception;

class DiscenteNotExistsException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 404);
    }


    /**
     * Cria uma exceção com a lista de IDs de discentes que não existem.
     *
     * @param array $discentesIds Lista de IDs de discentes inexistentes.
     * @return DiscenteNotExistsException
     */
    static public function fromDiscentesIds(array $discentesIds)
    {
        $ids = implode(', ', $discentesIds);
        $message = "Os IDs {'$ids'} dos discentes informados não existem.";
        return new DiscenteNotExistsException($message);
    }

    static public function fromMatricula(string $matricula)
    {
        return new DiscenteNotExistsException("A matrícula {'$matricula'} do discente informada não existem.");
    }
}

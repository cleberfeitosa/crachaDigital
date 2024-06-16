<?php

namespace App\Modules\Discentes\Application\Services;

use App\Modules\Discentes\Adapters\Database\LiberacaoDiscenteRepositoryImpl;
use App\Modules\Discentes\Core\Exceptions\LiberacaoDiscenteNaoExisteException;

class LiberacaoDiscenteService
{
    public function __construct(
        protected LiberacaoDiscenteRepositoryImpl $liberacaoDiscenteRepository
    ) {
    }

    public function findById(string $liberacaoDiscenteId)
    {
        $liberacaoDiscente = $this->liberacaoDiscenteRepository->findLiberacaoDiscenteById($liberacaoDiscenteId);

        if (!$liberacaoDiscente) {
            throw LiberacaoDiscenteNaoExisteException::fromId($liberacaoDiscenteId);
        }

        return $liberacaoDiscente;
    }
}

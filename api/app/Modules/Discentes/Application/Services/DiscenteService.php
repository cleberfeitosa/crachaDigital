<?php

namespace App\Modules\Discentes\Application\Services;

use App\Modules\Discentes\Adapters\Database\DiscenteRepositoryImpl;
use App\Modules\Discentes\Core\Exceptions\DiscenteNotExistsException;

class DiscenteService
{
    public function __construct(
        protected DiscenteRepositoryImpl $discenteRepository
    ) {
    }

    public function findAll($filtros = [])
    {
        return $this->discenteRepository->findAllDiscentes($filtros);
    }

    public function findByMatricula(string $matricula)
    {
        $discente = $this->discenteRepository->findDiscenteByMatricula($matricula);

        if (!$discente) {
            throw DiscenteNotExistsException::fromMatricula($matricula);
        }

        return $discente;
    }
}

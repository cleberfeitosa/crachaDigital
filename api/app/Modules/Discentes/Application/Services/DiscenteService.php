<?php

namespace App\Modules\Discentes\Application\Services;

use App\Modules\Discentes\Adapters\Database\DiscenteRepositoryImpl;

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
}

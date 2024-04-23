<?php

namespace App\Modules\Turmas\Application\Services;

use App\Modules\Turmas\Adapters\Database\TurmaRepositoryImpl;

class TurmaService
{
    public function __construct(
        protected TurmaRepositoryImpl $turmaRepository
    ) {
    }

    public function findAll($filtros = [])
    {
        return $this->turmaRepository->findAllTurmas($filtros);
    }
}

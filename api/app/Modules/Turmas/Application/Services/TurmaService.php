<?php

namespace App\Modules\Turmas\Application\Services;

use App\Modules\Turmas\Adapters\Database\TurmaRepositoryImpl;
use App\Modules\Turmas\Core\Entities\Turma;
use App\Modules\Turmas\Core\Exceptions\TurmaNotExistsException;

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

    /**
     * @param string $id
     */
    public function findById(string $id): Turma
    {
        $turma = $this->turmaRepository->findTurmaById($id);


        if (!$turma) {
            throw TurmaNotExistsException::newException();
        }

        return $turma;
    }
}

<?php

namespace App\Modules\Turmas\Core\Interfaces;

use App\Modules\Turmas\Core\Entities\Turma;

interface TurmaRepository
{
    public function findAllTurmas($filtros = []);

    function findTurmaById(string $turmaId): Turma | null;
}

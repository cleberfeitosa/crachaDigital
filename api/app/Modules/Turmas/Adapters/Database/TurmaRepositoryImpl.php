<?php

namespace App\Modules\Turmas\Adapters\Database;

use App\Modules\Common\Core\Entities\Repository;
use App\Modules\Turmas\Core\Entities\Turma;
use App\Modules\Turmas\Core\Interfaces\TurmaRepository;

class TurmaRepositoryImpl extends Repository implements TurmaRepository
{

    public function __construct()
    {
        parent::__construct('turmas');
    }

    public function findAllTurmas($filtros = [])
    {
        $builder = Turma::query();

        $this->applyTurmasFilters($builder, $filtros);

        $page = isset($filtros['page']) ? max(1, $filtros['page']) : 1;
        $take = isset($filtros['take']) ? max(1, $filtros['take']) : 15;

        return $this->paginate($builder, $page, $take);
    }

    private function applyTurmasFilters($builder, $filtros)
    {
        if (!empty($filtros)) {
            if (isset($filtros['nome'])) {
                $builder = $this->whereLike($builder, 'nome', $filtros['nome']);
            }

            if (isset($filtros['curso'])) {
                $builder = $this->whereLike($builder, 'curso', $filtros['curso']);
            }

            if (isset($filtros['periodo'])) {
                $builder = $this->whereLike($builder, 'periodo', $filtros['periodo']);
            }
        }
    }

    function findTurmaById(string $turmaId): Turma | null
    {
        $builder = Turma::query();

        return $builder->where('id', '=', $turmaId)->first();
    }
}

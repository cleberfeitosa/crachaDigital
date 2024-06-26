<?php

namespace App\Modules\Discentes\Adapters\Database;

use App\Modules\Common\Core\Entities\Repository;
use App\Modules\Discentes\Core\Entities\Discente;
use App\Modules\Discentes\Core\Interfaces\DiscenteRepository;

class DiscenteRepositoryImpl extends Repository implements DiscenteRepository
{
    public function __construct()
    {
        parent::__construct('discentes');
    }

    public function findDiscentesByIds(array $discentesIds)
    {
        $builder = Discente::query();

        return $builder->whereIn('id', $discentesIds)->get();
    }

    public function findDiscenteByMatricula(string $matricula)
    {
        $builder = Discente::query();

        return $builder->where('matricula', '=', $matricula)->first();
    }

    public function findAllDiscentes($filtros = [])
    {
        $builder = Discente::query();

        $this->applyDiscentesFilters($builder, $filtros);

        $page = isset($filtros['page']) ? max(1, $filtros['page']) : 1;
        $take = isset($filtros['take']) ? max(1, $filtros['take']) : 15;

        return $this->paginate($builder, $page, $take);
    }

    private function applyDiscentesFilters($builder, $filtros)
    {
        if (!empty($filtros)) {
            if (isset($filtros['turma_id'])) {
                $builder->where('turma_id', $filtros['turma_id']);
            }
            if (isset($filtros['matricula'])) {
                $builder = $this->whereLike($builder, 'matricula', $filtros['matricula']);
            }
            if (isset($filtros['nome'])) {
                $builder = $this->whereLike($builder, 'nome', $filtros['nome']);
            }
        }
    }
}

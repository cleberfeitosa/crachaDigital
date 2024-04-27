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

        if (key_exists('nome', $filtros)) {
            $builder = $this->whereLike($builder, 'nome', $filtros['nome']);
        }

        if (key_exists('curso', $filtros)) {
            $builder = $this->whereLike($builder, 'curso', $filtros['curso']);
        }

        if (key_exists('periodo', $filtros)) {
            $builder = $this->whereLike($builder, 'periodo', $filtros['periodo']);
        }

        $page = key_exists('page', $filtros) ? $filtros['page'] : 1;
        $take = key_exists('take', $filtros) ? $filtros['take'] : 15;


        return $this->paginate($builder, $page, $take);
    }
}

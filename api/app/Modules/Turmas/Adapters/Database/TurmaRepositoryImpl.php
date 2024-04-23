<?php

namespace App\Modules\Turmas\Adapters\Database;

use App\Modules\Common\Core\Entities\Repository;
use App\Modules\Turmas\Core\Interfaces\TurmaRepository;

class TurmaRepositoryImpl extends Repository implements TurmaRepository
{

    public function __construct()
    {
        parent::__construct('turmas');
    }

    public function findAllTurmas($filtros = [])
    {

        if (key_exists('nome', $filtros)) {
            $this->whereLike('nome', $filtros['nome']);
        }

        if (key_exists('curso', $filtros)) {
            $this->whereLike('curso', $filtros['curso']);
        }

        if (key_exists('periodo', $filtros)) {
            $this->whereLike('periodo', $filtros['periodo']);
        }

        $page = key_exists('page', $filtros) ? $filtros['page'] : 1;
        $take = key_exists('take', $filtros) ? $filtros['take'] : 15;


        return $this->paginate($page, $take);
    }
}

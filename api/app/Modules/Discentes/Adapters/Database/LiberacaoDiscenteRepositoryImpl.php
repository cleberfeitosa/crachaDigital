<?php

namespace App\Modules\Discentes\Adapters\Database;

use App\Modules\Common\Core\Entities\Repository;
use App\Modules\Discentes\Core\Entities\LiberacaoDiscente;
use App\Modules\Discentes\Core\Interfaces\LiberacaoDiscenteRepository;

class LiberacaoDiscenteRepositoryImpl extends Repository implements LiberacaoDiscenteRepository
{
    public function __construct()
    {
        parent::__construct('liberacao_discentes');
    }

    public function findLiberacaoDiscenteByDiscentesIds(array $discentesIds)
    {
        $builder = LiberacaoDiscente::query();

        return $builder->whereIn('discente_id', $discentesIds)->get();
    }
}

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
}

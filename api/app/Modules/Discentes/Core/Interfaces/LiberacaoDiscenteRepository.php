<?php

namespace App\Modules\Discentes\Core\Interfaces;

interface LiberacaoDiscenteRepository
{
    public function findLiberacaoDiscenteByDiscentesIds(array $discentesIds);
}

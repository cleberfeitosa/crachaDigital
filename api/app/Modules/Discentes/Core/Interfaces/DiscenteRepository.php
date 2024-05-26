<?php

namespace App\Modules\Discentes\Core\Interfaces;


interface DiscenteRepository
{
    public function findDiscentesByIds(array $discentesIds);
}

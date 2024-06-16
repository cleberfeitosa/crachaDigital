<?php

namespace App\Modules\Discentes\Core\Interfaces;

use App\Modules\Discentes\Core\Entities\LiberacaoDiscente;

interface LiberacaoDiscenteRepository
{
    public function findLiberacaoDiscenteByDiscentesIds(array $discentesIds);
    public function findLiberacoesDiscentesAtivasByDiscentesIds(array $discentesIds);
    public function findLiberacaoDiscenteById(string $liberacaoDiscenteId): LiberacaoDiscente | null;
}

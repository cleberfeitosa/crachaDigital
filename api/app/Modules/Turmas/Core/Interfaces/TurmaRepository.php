<?php

namespace App\Modules\Turmas\Core\Interfaces;

interface TurmaRepository
{
    public function findAllTurmas($filtros = []);
}

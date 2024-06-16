<?php

namespace App\Modules\Discentes\Application\UseCases;

use App\Modules\Discentes\Adapters\Database\LiberacaoDiscenteRepositoryImpl;
use App\Modules\Discentes\Application\Services\LiberacaoDiscenteService;

class EncerrarLiberacaoDiscenteUseCase
{

    public function __construct(
        protected LiberacaoDiscenteService $liberacaoDiscenteService,
        protected LiberacaoDiscenteRepositoryImpl $liberacaoDiscenteRepository
    ) {
    }

    public function run(string $liberacaoDiscenteId)
    {
        $liberacaoDiscente = $this->liberacaoDiscenteService->findById($liberacaoDiscenteId);
        $liberacaoDiscente->encerrarLiberacao();
        $this->liberacaoDiscenteRepository->save($liberacaoDiscente);
    }
}

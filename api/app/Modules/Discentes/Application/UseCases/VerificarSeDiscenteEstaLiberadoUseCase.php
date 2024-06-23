<?php

namespace App\Modules\Discentes\Application\UseCases;

use App\Modules\Discentes\Adapters\Dto\VerificarSeDiscenteEstaLiberadoDto;
use App\Modules\Discentes\Application\Services\DiscenteService;
use App\Modules\Discentes\Application\Services\LiberacaoDiscenteService;

class VerificarSeDiscenteEstaLiberadoUseCase
{
    public function __construct(
        protected LiberacaoDiscenteService $liberacaoDiscenteService,
        protected DiscenteService $discenteService
    ) {
    }

    public function run(VerificarSeDiscenteEstaLiberadoDto $verificarSeDiscenteEstaLiberadoDto)
    {
        $discente = $this->discenteService->findByMatricula($verificarSeDiscenteEstaLiberadoDto->matricula);

        $liberacaoDiscente = $this->liberacaoDiscenteService->findLatestLiberacaoDiscenteByDiscenteId($discente->id);
        return array([
            "estaLiberado" => $liberacaoDiscente->estaAtiva()
        ]);
    }
}

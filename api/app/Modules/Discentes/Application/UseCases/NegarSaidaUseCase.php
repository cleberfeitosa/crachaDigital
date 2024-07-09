<?php

namespace App\Modules\Discentes\Application\UseCases;

use App\Modules\Discentes\Adapters\Database\LiberacaoDiscenteRepositoryImpl;
use App\Modules\Discentes\Adapters\Dto\NegarSaidaDto;
use App\Modules\Discentes\Application\Services\LiberacaoDiscenteService;
use App\Modules\Usuarios\Application\Services\UsuarioService;

class NegarSaidaUseCase
{
    public function __construct(
        protected LiberacaoDiscenteService $liberacaoDiscenteService,
        protected UsuarioService $usuarioService,
        protected LiberacaoDiscenteRepositoryImpl $liberacaoDiscenteRepository
    ) {
    }

    public function run(NegarSaidaDto $negarSaidaDto)
    {
        $this->usuarioService->findById($negarSaidaDto->usuarioId);

        $liberacaoDiscente = $this->liberacaoDiscenteService->findById($negarSaidaDto->liberacaoDiscenteId);

        $liberacaoDiscente->negarSaida($negarSaidaDto->usuarioId, $negarSaidaDto->motivo);

        $this->liberacaoDiscenteRepository->save($liberacaoDiscente);
    }
}

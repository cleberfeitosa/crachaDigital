<?php

namespace App\Modules\Discentes\Application\UseCases;

use App\Modules\Discentes\Adapters\Database\LiberacaoDiscenteRepositoryImpl;
use App\Modules\Discentes\Adapters\Dto\ConfirmarSaidaDto;
use App\Modules\Discentes\Application\Services\LiberacaoDiscenteService;
use App\Modules\Usuarios\Application\Services\UsuarioService;

class ConfirmarSaidaUseCase
{
    public function __construct(
        protected LiberacaoDiscenteService $liberacaoDiscenteService,
        protected UsuarioService $usuarioService,
        protected LiberacaoDiscenteRepositoryImpl $liberacaoDiscenteRepository
    ) {
    }

    public function run(ConfirmarSaidaDto $confirmarSaidaDto)
    {
        $this->usuarioService->findById($confirmarSaidaDto->usuarioId);

        $liberacaoDiscente = $this->liberacaoDiscenteService->findById($confirmarSaidaDto->liberacaoDiscenteId);

        $liberacaoDiscente->confirmarSaida();

        $this->liberacaoDiscenteRepository->save($liberacaoDiscente);
    }
}

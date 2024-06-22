<?php

namespace App\Modules\Discentes\Application\UseCases;

use App\Modules\Discentes\Adapters\Database\DiscenteRepositoryImpl;
use App\Modules\Discentes\Adapters\Database\LiberacaoDiscenteRepositoryImpl;
use App\Modules\Discentes\Adapters\Dto\CreateLiberacoesDiscentesDto;
use App\Modules\Discentes\Adapters\Dto\VerificarSeDiscenteEstaLiberadoDto;
use App\Modules\Discentes\Adapters\Jobs\EncerrarLiberacaoDiscenteJob;
use App\Modules\Discentes\Application\Services\DiscenteService;
use App\Modules\Discentes\Application\Services\LiberacaoDiscenteService;
use App\Modules\Discentes\Core\Entities\LiberacaoDiscente;
use App\Modules\Discentes\Core\Exceptions\DiscenteNotExistsException;
use App\Modules\Discentes\Core\Exceptions\LiberacaoDiscenteIsAtivaException;
use Illuminate\Support\Facades\Log;

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
        Log::debug($liberacaoDiscente);
        return array([
            "estaLiberado" => $liberacaoDiscente->estaAtiva()
        ]);
    }
}

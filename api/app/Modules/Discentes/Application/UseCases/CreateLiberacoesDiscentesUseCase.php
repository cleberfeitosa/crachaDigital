<?php

namespace App\Modules\Discentes\Application\UseCases;

use App\Modules\Discentes\Adapters\Database\DiscenteRepositoryImpl;
use App\Modules\Discentes\Adapters\Database\LiberacaoDiscenteRepositoryImpl;
use App\Modules\Discentes\Adapters\Dto\CreateLiberacoesDiscentesDto;
use App\Modules\Discentes\Core\Entities\LiberacaoDiscente;
use App\Modules\Discentes\Core\Exceptions\DiscenteNotExistsException;
use App\Modules\Discentes\Core\Exceptions\LiberacaoDiscenteIsAtivaException;



class CreateLiberacoesDiscentesUseCase
{
    public function __construct(
        protected LiberacaoDiscenteRepositoryImpl $liberacaoDiscenteRepository,
        protected DiscenteRepositoryImpl $discenteRepository
    ) {
    }

    public function run(CreateLiberacoesDiscentesDto $createLiberacoesDiscentesDto)
    {

        $discentesIds = $createLiberacoesDiscentesDto->discentesIds;
        $discentes = $this->discenteRepository->findDiscentesByIds($discentesIds);

        $discentesIdsExists = $discentes->pluck('id')->toArray();
        $discentesIdsNotExists = array_diff($discentesIds, $discentesIdsExists);

        if (!empty($discentesIdsNotExists)) {
            throw DiscenteNotExistsException::fromDiscentesIds($discentesIdsNotExists);
        }

        $liberacoesDiscentes = $this->liberacaoDiscenteRepository->findLiberacaoDiscenteByDiscentesIds($createLiberacoesDiscentesDto->discentesIds);
        $discentesIdsWithLiberacaoAtiva = $liberacoesDiscentes->pluck('discente_id')->toArray();
        if (
            !empty($discentesIdsWithLiberacaoAtiva)
        ) {
            throw LiberacaoDiscenteIsAtivaException::fromDiscentesIds($discentesIdsWithLiberacaoAtiva);
        }

        $liberacoesDiscentes = array_map([CreateLiberacoesDiscentesUseCase::class, 'mapCreateLiberacao'], $discentesIds);

        $savedLiberacoesDiscentes = $this->liberacaoDiscenteRepository->saveMany($liberacoesDiscentes);

        return $savedLiberacoesDiscentes;
    }

    private function mapCreateLiberacao($discenteId): LiberacaoDiscente
    {
        return LiberacaoDiscente::createLiberacaoDiscente($discenteId);
    }
}

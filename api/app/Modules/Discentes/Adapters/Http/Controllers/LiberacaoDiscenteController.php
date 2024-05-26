<?php

namespace App\Modules\Discentes\Adapters\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Application\Utils\ExceptionHandler;
use App\Modules\Discentes\Adapters\Dto\CreateLiberacoesDiscentesDto;
use App\Modules\Discentes\Application\UseCases\CreateLiberacoesDiscentesUseCase;
use Illuminate\Http\Request;

class LiberacaoDiscenteController extends Controller
{

    public function __construct(protected CreateLiberacoesDiscentesUseCase $createLiberacoesDiscentesUseCase)
    {
    }


    public function createLiberacoesDiscentes(Request $request)
    {
        try {
            $createLiberacoesDiscentesDto = new CreateLiberacoesDiscentesDto();
            $createLiberacoesDiscentesDto->discentesIds = $request->input('discentesIds');
            $liberacoesDiscentes = $this->createLiberacoesDiscentesUseCase->run($createLiberacoesDiscentesDto);

            return response()->json(
                $liberacoesDiscentes
            );
        } catch (\Throwable $th) {
            $formatedException = ExceptionHandler::format($th);
            return response()->json($formatedException, $formatedException['code']);
        }
    }
}

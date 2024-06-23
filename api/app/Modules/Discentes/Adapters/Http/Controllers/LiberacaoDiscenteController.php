<?php

namespace App\Modules\Discentes\Adapters\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Application\Utils\ExceptionHandler;
use App\Modules\Discentes\Adapters\Dto\ConfirmarSaidaDto;
use App\Modules\Discentes\Adapters\Dto\CreateLiberacoesDiscentesDto;
use App\Modules\Discentes\Adapters\Dto\VerificarSeDiscenteEstaLiberadoDto;
use App\Modules\Discentes\Application\UseCases\ConfirmarSaidaUseCase;
use App\Modules\Discentes\Application\UseCases\CreateLiberacoesDiscentesUseCase;
use App\Modules\Discentes\Application\UseCases\VerificarSeDiscenteEstaLiberadoUseCase;
use Illuminate\Http\Request;

class LiberacaoDiscenteController extends Controller
{

    public function __construct(
        protected CreateLiberacoesDiscentesUseCase $createLiberacoesDiscentesUseCase,
        protected VerificarSeDiscenteEstaLiberadoUseCase $verificarSeDiscenteEstaLiberadoUseCase,
        protected ConfirmarSaidaUseCase $confirmarSaidaUseCase
    ) {
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

    public function verificarSeDiscenteEstaLiberado(Request $request)
    {
        try {
            $verificarSeDiscenteEstaLiberadoDto = new VerificarSeDiscenteEstaLiberadoDto();
            $verificarSeDiscenteEstaLiberadoDto->matricula = $request->input('matricula');
            $resultado = $this->verificarSeDiscenteEstaLiberadoUseCase->run($verificarSeDiscenteEstaLiberadoDto);

            return response()->json(
                $resultado
            );
        } catch (\Throwable $th) {
            $formatedException = ExceptionHandler::format($th);
            return response()->json($formatedException, $formatedException['code']);
        }
    }

    public function confirmarSaida(Request $request, string $id)
    {
        try {
            $usuarioId = $request->user()->id;

            $confirmarSaidaDto = new ConfirmarSaidaDto();
            $confirmarSaidaDto->usuarioId = $usuarioId;
            $confirmarSaidaDto->liberacaoDiscenteId = $id;

            $this->confirmarSaidaUseCase->run($confirmarSaidaDto);

            return response()->noContent();
        } catch (\Throwable $th) {
            $formatedException = ExceptionHandler::format($th);
            return response()->json($formatedException, $formatedException['code']);
        }
    }
}

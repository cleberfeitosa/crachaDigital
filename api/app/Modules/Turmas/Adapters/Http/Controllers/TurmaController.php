<?php

namespace App\Modules\Turmas\Adapters\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Application\Utils\ExceptionHandler;
use App\Modules\Turmas\Application\Services\TurmaService;
use Illuminate\Http\Request;

class TurmaController extends Controller
{

    public function __construct(protected TurmaService $turmaService)
    {
    }

    public function index(Request $request)
    {
        try {
            $filtros = $request->query();

            $pagedTurma = $this->turmaService->findAll($filtros);

            return response()->json([
                $pagedTurma
            ], 200);
        } catch (\Throwable $th) {
            $formatedException = ExceptionHandler::format($th);

            return response()->json($formatedException, $formatedException['code']);
        }
    }

    public function show(Request $request, string $id)
    {
        try {

            $turma = $this->turmaService->findById($id);

            return response()->json([
                $turma
            ]);
        } catch (\Throwable $th) {
            $formatedException = ExceptionHandler::format($th);

            return response()->json($formatedException, $formatedException['code']);
        }
    }
}

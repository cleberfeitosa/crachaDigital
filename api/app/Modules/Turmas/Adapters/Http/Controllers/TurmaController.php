<?php

namespace App\Modules\Turmas\Adapters\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Turmas\Application\Services\TurmaService;
use Illuminate\Http\Request;

class TurmaController extends Controller
{

    public function __construct(protected TurmaService $turmaService)
    {
    }

    public function index(Request $request)
    {
        $filtros = $request->query();

        $pagedTurma = $this->turmaService->findAll($filtros);

        return response()->json([
            $pagedTurma
        ], 200);
    }
}

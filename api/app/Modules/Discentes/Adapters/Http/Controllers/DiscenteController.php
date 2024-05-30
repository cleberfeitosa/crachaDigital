<?php


namespace App\Modules\Discentes\Adapters\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Application\Utils\ExceptionHandler;
use App\Modules\Discentes\Application\Services\DiscenteService;
use Illuminate\Http\Request;

class DiscenteController extends Controller
{
    public function __construct(
        protected DiscenteService $discenteService,
    ) {
    }

    public function index(Request $request)
    {
        try {
            $filtros = $request->query();

            $pagedDiscente = $this->discenteService->findAll($filtros);

            return response()->json([
                $pagedDiscente
            ], 200);
        } catch (\Throwable $th) {
            $formatedException = ExceptionHandler::format($th);

            return response()->json($formatedException, $formatedException['code']);
        }
    }
}

<?php

namespace App\Modules\Auth\Adapters\Http\Middlewares;

use App\Modules\Auth\Application\UseCases\ValidateRoleUseCase;
use App\Modules\Common\Application\Utils\ExceptionHandler;
use App\Modules\Usuarios\Core\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CoordenadorRoleMiddleware
{

    public function __construct(protected ValidateRoleUseCase $validateRoleUseCase)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $usuario = Auth::getUser();
            $this->validateRoleUseCase->run($usuario, RoleEnum::COORDENADOR->value);

            return $next($request);
        } catch (\Throwable $th) {
            $formatedException = ExceptionHandler::format($th);
            return response()->json($formatedException, $formatedException['code']);
        }
    }
}

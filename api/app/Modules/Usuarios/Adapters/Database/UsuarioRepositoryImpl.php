<?php

namespace App\Modules\Usuarios\Adapters\Database;

use App\Modules\Common\Core\Entities\Repository;
use App\Modules\Usuarios\Core\Entities\Usuario;
use App\Modules\Usuarios\Core\Interfaces\UsuarioRepository;
use Illuminate\Support\Facades\DB;

class UsuarioRepositoryImpl extends Repository implements UsuarioRepository
{

    public function __construct()
    {
        parent::__construct('usuarios');
    }

    function findUsuarioById($usuarioId): Usuario | null
    {
        $builder = Usuario::query();
        return $builder->where('id', '=', $usuarioId)->first();
    }
}

<?php

namespace App\Modules\Usuarios\Core\Interfaces;

use App\Modules\Usuarios\Core\Entities\Usuario;

interface UsuarioRepository
{
    public function findUsuarioById($usuarioId): Usuario | null;
}

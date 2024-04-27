<?php

namespace App\Modules\Auth\Application\Dtos;

use App\Modules\Usuarios\Core\Entities\Usuario;

class UsuarioAuthenticatedDto
{
    public string $token;
    public Usuario $usuario;
}

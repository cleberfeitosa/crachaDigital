<?php

namespace App\Modules\Discentes\Core\Enums;

enum SituacaoLiberacaoEnum: int
{
    case ATIVA = 1;
    case ENCERRADA = 2;
    case RETIDO = 3;
    case CONCLUIDO = 4;
}

<?php

namespace App\Modules\Discentes\Core\Entities;

use App\Modules\Discentes\Core\Enums\SituacaoLiberacaoEnum;
use App\Modules\Discentes\Core\Exceptions\LiberacaoDiscenteIsEncerradaException;
use App\Modules\Discentes\Core\Exceptions\LiberacaoDiscenteIsRetidaException;
use App\Modules\Usuarios\Core\Entities\Usuario;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $discente_id
 * @property int $vigilante_id
 * @property int $situacao
 * @property int $decidido_em
 * @property string $motivo_negacao
 */
class LiberacaoDiscente extends Model
{
    use HasFactory, HasUuids;


    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'discente_id',
        'vigilante_id',
        'situacao',
        'decidido_em',
        'motivo_negacao',
    ];

    public function discente(): BelongsTo
    {
        return $this->belongsTo(Discente::class);
    }

    public function vigilante(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    /**
     * Métodos personalizados estáticos
     */
    static public function createLiberacaoDiscente(string $discenteId)
    {
        $liberacaoDiscente = new LiberacaoDiscente();
        $liberacaoDiscente->discente_id = $discenteId;
        $liberacaoDiscente->situacao = SituacaoLiberacaoEnum::ATIVA;
        return $liberacaoDiscente;
    }

    /**
     * Métodos personalizados de classe
     */
    function encerrarLiberacao()
    {
        if ($this->situacao === SituacaoLiberacaoEnum::ENCERRADA) {
            throw LiberacaoDiscenteIsEncerradaException::newError();
        }

        if ($this->situacao === SituacaoLiberacaoEnum::RETIDO) {
            throw LiberacaoDiscenteIsRetidaException::newError();
        }

        $this->situacao = SituacaoLiberacaoEnum::ENCERRADA;
    }

    function estaAtiva(): bool
    {
        return $this->situacao === SituacaoLiberacaoEnum::ATIVA->value;
    }
}

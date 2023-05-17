<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;// Uso de UUID como chave primaria


class ReleaseType extends Model
{
    use HasUuids;
    use HasFactory;

    /**
     * Tabela associdada com o modelo.
     *
     * @var string
     */
    protected $table = 'release_type';

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'release_type'
    ];

    public function ReleaseHistory(): HasMany{
        return $this->hasMany(ReleaseHistory::class, 'release_history');
    }
}

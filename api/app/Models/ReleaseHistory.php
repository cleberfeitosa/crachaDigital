<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;// Uso de UUID como chave primaria


class ReleaseHistory extends Model
{
    use HasUuids;
    use HasFactory;

    /**
     * Tabela associdada com o modelo.
     *
     * @var string
     */
    protected $table = 'release_history';

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'reason',
        'release_type',
        'student',
        'guard'
    ];

    public function guards(): BelongsTo{
        return $this->belongsTo(Guard::class);
    }

    public function ReleaseType(): BelongsTo{
        return $this->belongsTo(ReleaseType::class, 'release_type');
    }

    public function students(): BelongsTo{
        return $this->belongsTo(Student::class);
    }

}

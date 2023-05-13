<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;// Uso de UUID como chave primaria

class Course extends Model
{
    use HasUuids;
    use HasFactory;

    /**
     * Tabela associada com o modelo.
     *
     * @var string
     */
    protected $table = 'course'; 

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'course_code',
        'course_name',
        'course_type'
    ];

    /**
     * Obter o tipo de curso a partir do curso
     */
    public function courseType(): BelongsTo {
        return $this->belongsTo(CourseType::class, 'course_type');
    }
}

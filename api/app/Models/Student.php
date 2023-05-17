<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;// Uso de UUID como chave primaria


class Student extends Model
{
    use HasUuids;
    use HasFactory;

    /**
     * Tabela associdada com o modelo.
     *
     * @var string
     */
    protected $table = 'student';

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'student_name',
        'registration',
        'password',
        'class'
    ];

    /* public function classes(): BelongsTo{
        return $this->belongsTo(Class::class);
    } */

}

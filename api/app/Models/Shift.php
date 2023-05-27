<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Shift extends Model
{
    use HasUuids; // Define o tipo da coluna ID como uuid
    use HasFactory;
    
    /**
     * Tabela associada com o modelo.
     *
     * @var string
     */
    protected $table = 'shift'; 

    /**
     * Os atributos que são atribuíveis em massa.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'shift_type',
    ];
}

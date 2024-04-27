<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Discente;
use App\Modules\Turmas\Core\Entities\Turma;
use App\Modules\Usuarios\Core\Entities\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Turma::factory()
            ->has(Discente::factory()->count(50))
            ->count(50)
            ->create();

        Usuario::factory()
            ->count(50)
            ->create();
    }
}

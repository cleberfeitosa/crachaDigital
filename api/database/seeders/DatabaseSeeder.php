<?php

namespace Database\Seeders;

use Database\Factories\CursoFactory;
use Database\Factories\DiscenteFactory;
use Database\Factories\TurmaFactory;
use Database\Factories\UsuarioFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $cursoFactory = CursoFactory::new();
        $turmaFactory = TurmaFactory::new();
        $discenteFactory = DiscenteFactory::new();


        $cursoFactory->has(
            $turmaFactory->has($discenteFactory->count(50))
                ->count(10)
        )->count(4)->create();

        $usuarioFactory = UsuarioFactory::new();
        $usuarioFactory
            ->count(50)
            ->create();
    }
}

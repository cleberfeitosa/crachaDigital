<?php

namespace Database\Seeders;

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

        $turmaFactory = TurmaFactory::new();
        $discenteFactory = DiscenteFactory::new();

        $turmaFactory->has($discenteFactory->count(50))
            ->count(50)
            ->create();

        $usuarioFactory = UsuarioFactory::new();
        $usuarioFactory
            ->count(50)
            ->create();
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('liberacao_turmas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('turma_id')->cascadeOnDelete()->constrained(
                table: 'turmas',
                indexName: 'fk_liberacao_turmas_turma_id'
            );
            $table->foreignUuid('coordenador_id')->cascadeOnDelete()->constrained(
                table: 'usuarios',
                indexName: 'fk_liberacao_turmas_coordenador_id'
            );
            $table->string('situacao', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liberacao_turmas');
    }
};

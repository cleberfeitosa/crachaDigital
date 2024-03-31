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
        Schema::create('discentes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome', 96);
            $table->string('matricula', 15);
            $table->foreignUuid('turma_id')->cascadeOnDelete()->constrained(
                table: 'turmas',
                indexName: 'fk_discente_turma_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discentes');
    }
};

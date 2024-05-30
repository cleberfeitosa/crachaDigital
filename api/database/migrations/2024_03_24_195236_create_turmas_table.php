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
        Schema::create('cursos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome', 36);
            $table->timestamps();
        });

        Schema::create('turmas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome', 36);
            $table->foreignUuid('curso_id')->cascadeOnDelete()->constrained(
                table: 'cursos',
                indexName: 'fk_discente_curso_id'
            );
            $table->integer('periodo', false, true);
            $table->string('turno', 12);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turmas');
        Schema::dropIfExists('cursos');
    }
};

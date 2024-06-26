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
        Schema::create('liberacao_discentes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('discente_id')->cascadeOnDelete()->constrained(
                table: 'discentes',
                indexName: 'fk_liberacao_discentes_discente_id'
            );
            $table->foreignUuid('vigilante_id')->nullable()->cascadeOnDelete()->constrained(
                table: 'usuarios',
                indexName: 'fk_liberacao_discentes_vigilante_id',
            );
            $table->integer('situacao', false, true)->nullable(false);
            $table->string('motivo_negacao', 520)->nullable();
            $table->dateTime('decidido_em')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liberacao_discentes');
    }
};

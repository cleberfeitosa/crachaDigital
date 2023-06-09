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
        Schema::create('team', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('team_code', 25)->unique();
            $table->string('team_name', 50);
            $table->foreignUuid('course')->cascadeOnDelete()->constrained(
                table: 'course', indexName: 'fk_class_course'
            );
            $table->foreignUuid('shift')->cascadeOnDelete()->constrained(
                table: 'shift', indexName: 'fk_class_shift'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team');
    }
};

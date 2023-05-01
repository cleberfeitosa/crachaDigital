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
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            $table->string("class_code", 25)->unique();
            $table->string("class_name", 50);
            $table->foreignId('course')->cascadeOnDelete()->constrained(
                table: 'course', indexName: 'fk_class_course'
            );
            $table->foreignId('shift')->cascadeOnDelete()->constrained(
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
        Schema::dropIfExists('class');
    }
};

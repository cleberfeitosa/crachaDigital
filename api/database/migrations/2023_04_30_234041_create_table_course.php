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
        Schema::create('course', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("course_code", 25)->unique();
            $table->string("course_name", 50);
            /**
             * 1° forma
             *  $table->bigInteger('course_type');
             *  $table->foreign('course_type')
             *      ->references('id')
             *      ->on('course_type')
             *      ->cascadeOnDelete();
             */
            $table->foreignUuid('course_type')->cascadeOnDelete()->constrained(
                table: 'course_type', indexName: 'fk_course_course_type'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};

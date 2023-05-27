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
        Schema::create('student', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("student_name", 50);
            $table->string("registration", 15)->unique();
            $table->string("password", 50);
            $table->foreignUuid('team')->cascadeOnDelete()->constrained(
                table: 'team', indexName: 'fk_student_class'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};

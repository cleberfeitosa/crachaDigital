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
        Schema::create('student_release', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('authorized_by', 60)->nullable();
            $table->foreignUuid('request_release')->cascadeOnDelete()->constrained(
                table: 'request_release',
                indexName: 'fk_class_release_request_release'
            );
            $table->foreignUuid('student')->cascadeOnDelete()->constrained(
                table: 'student',
                indexName: 'fk_student_release_student'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_release');
    }
};

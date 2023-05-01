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
            $table->id();
            $table->string('authorized_by', 60)->nullable();
            $table->foreignId('request_release')->cascadeOnDelete()->constrained(
                table: 'request_release',
                indexName: 'fk_class_release_request_release'
            );
            $table->foreignId('student')->cascadeOnDelete()->constrained(
                table: 'student',
                indexName: 'fk_student_release_student'
            );
            $table->foreignId('release_status')->cascadeOnDelete()->constrained(
                table: 'release_status',
                indexName: 'fk_class_release_release_status'
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

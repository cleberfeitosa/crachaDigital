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
        Schema::create('release_approved', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('release_type')->cascadeOnDelete()->constrained(
                table: 'release_type', indexName: 'fk_release_approved_release_type'
            );
            $table->foreignUuid('student')->cascadeOnDelete()->constrained(
                table: 'student', indexName: 'fk_release_approved_student'
            );
            $table->foreignUuid('guard')->cascadeOnDelete()->constrained(
                table: 'guard', indexName: 'fk_release_approved_guard'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('release_approved');
    }
};

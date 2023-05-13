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
        Schema::create('request_release', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('requester')->cascadeOnDelete()->constrained(
                table: 'server', indexName: 'fk_request_release_requester'
            );
            $table->foreignUuid('evaluator')->cascadeOnDelete()->constrained(
                table: 'server', indexName: 'fk_request_release_evaluator'
            );
            $table->foreignUuid('status')->cascadeOnDelete()->constrained(
                table: 'request_release_status', indexName: 'fk_request_release_status'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_release');
    }
};

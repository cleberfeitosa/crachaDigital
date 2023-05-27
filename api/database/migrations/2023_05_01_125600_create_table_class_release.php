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
        Schema::create('team_release', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('request_release')->cascadeOnDelete()->constrained(
                table: 'request_release', indexName: 'fk_class_release_request_release'
            );
            $table->foreignUuid('team')->cascadeOnDelete()->constrained(
                table: 'team', indexName: 'fk_class_release_class'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_release');
    }
};

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
        Schema::create('class_release', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_release')->cascadeOnDelete()->constrained(
                table: 'request_release', indexName: 'fk_class_release_request_release'
            );
            $table->foreignId('class')->cascadeOnDelete()->constrained(
                table: 'class', indexName: 'fk_class_release_class'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_release');
    }
};

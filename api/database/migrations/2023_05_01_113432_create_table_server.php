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
        Schema::create('server', function (Blueprint $table) {
            $table->id();
            $table->string('server_name', 50);
            $table->string('registration', 15)->unique();
            $table->string('password', 60);
            $table->foreignId('sector')->cascadeOnDelete()->constrained(
                table: 'sector', indexName: 'fk_server_sector'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server');
    }
};

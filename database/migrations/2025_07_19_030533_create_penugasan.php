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
        Schema::create('penugasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_keluhan')->constrained('keluhan')->onDelete('cascade');
            $table->foreignId('id_petugas')->constrained('petugas')->onDelete('cascade');
            $table->dateTime('tanggal');
            $table->enum('status', ['assigned', 'in_progress', 'completed'])->default('assigned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan');
    }
};

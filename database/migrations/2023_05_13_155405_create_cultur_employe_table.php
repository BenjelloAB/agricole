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
        Schema::create('cultur_employe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cultur_id');
            $table->unsignedBigInteger('employe_id');
            $table->timestamps();
            $table->foreign('cultur_id')->references('id')->on('culturs')->onDelete('cascade');
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultur_employe');
    }
};
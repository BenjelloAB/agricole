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
        Schema::create('controls', function (Blueprint $table) {

            $table->id();
            $table->foreignId('parcelle_id')->constrained('parcelles')->cascadeOnDelete('cascade');
            $table->string('etat_sante');
            $table->string('texture_du_sol');
            $table->unsignedBigInteger('ph_du_sol');
            $table->string('etat_de_produit_recolte');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controls');
    }
};

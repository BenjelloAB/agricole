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
        Schema::create('culturs', function (Blueprint $table) {
            $table->id();
            $table->string('parcelle_id');
            $table->string('employe_id');
            $table->string('nom');
            $table->string('type');
            $table->string('date_de_plantation_culture');
            $table->string('date_de_récolte_prévue_culture');
            $table->string('besoin_en_eau');
            $table->string('besoin_en_nutriments_culture');
            $table->string('besoin_en_pesticides_culture');
            $table->string('état_de_santé_culture');
            $table->timestamps();
            // $table->foreign('parcelle_id')->references('id')->on('parcelles')->onDelete('cascade');
            // $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culturs');
    }
};
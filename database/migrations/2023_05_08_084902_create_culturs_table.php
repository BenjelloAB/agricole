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
            $table->foreignId('parcelle_id')->references('id')->on('parcelles')->onDelete('cascade');
            $table->string('nom');
            $table->string('type');
            $table->string('date_de_plantation_culture');
            $table->string('date_de_récolte_prévue_culture');
            $table->string('besoin_en_eau');
            $table->string('besoin_en_nutriments_culture');
            $table->string('besoin_en_pesticides_culture');
            $table->string('état_de_santé_culture');
            $table->string('user_id');
            $table->timestamps();
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

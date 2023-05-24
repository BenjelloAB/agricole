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
        Schema::create('recoltes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcelle_id')->references('id')->on('parcelles')->onDelete('cascade');
            $table->string('quantité_récoltée');
            $table->string('date_récolte');
            $table->string('coût_récolte');
            $table->string('Moyen_rendement');
            $table->string('qualité_récolte');
            $table->string('prix_de_vente');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recoltes');
    }
};
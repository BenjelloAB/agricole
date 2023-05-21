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
        Schema::create('finance__recoltes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recolte_id')->constrained('recoltes')->onDelete('cascade');
            $table->string('coût_récolte');
            $table->string('prix_de_vente');
            $table->string('revenu_net');
            $table->string('revenu_brut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance__recoltes');
    }
};
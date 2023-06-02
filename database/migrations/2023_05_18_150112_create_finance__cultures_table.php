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

        Schema::create('finance__cultures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcelle_id')->constrained('parcelles')->onDelete('cascade');
           // $table->foreignId('culture_id')->references('id')->on('ressourcecultures')->onDelete('cascade');
            $table->string('coût_semences');
            $table->string('coût_engrais');
            $table->string('coût_pesticides');
            $table->string('coût_machines_culture');
            $table->string('cout_consommation_eau');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance__cultures');
    }
};
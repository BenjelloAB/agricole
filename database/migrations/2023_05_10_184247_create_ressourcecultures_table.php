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
        Schema::create('ressourcecultures', function (Blueprint $table) {
            $table->id();
            // $table->string('culture_id');
            $table->foreignId('parcelle_id')->references('id')->on('parcelles')->onDelete('cascade');
            $table->string('semences');
            $table->string('engrais');
            $table->string('pesticides');
            $table->string('besoin_en_eau');
            $table->string('besoin_en_pesticides_culture');
            // $table->string('nummachine');
            $table->string('nom_machine');
            // $table->foreign('culture_id')->references('id')->on('culturs');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressourcecultures');
    }
};
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
        Schema::create('parcelles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('emplacement');
            $table->string('taille');
            $table->string('type_de_sol');
            $table->string('niveau_dirrigation');
            // $table->string('type_de_culture');
            // $table->string('type_de_semence');
            // $table->string('type_de_fertilisant');
            // $table->string('type_de_pesticide');
            // $table->string('type_de_herbicide');
            // $table->string('type_de_fongicide');
            // $table->string('type_de_nematocide');
            // $table->string('type_de_tracteur');
            $table->string('état_de_santé');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelles');
    }
};
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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->required();
            $table->string('prenom')->required();
            $table->string('date')->required();
            $table->string('lieu')->required();
            $table->string('situation')->required();
            $table->string('adress')->required();
            $table->string('cin')->required();
            $table->string('tele')->required();
            $table->string('mail')->nullable();
            $table->string('scolaire')->nullable();
            $table->string('experiance')->required();
            $table->string('employe')->nullable();
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
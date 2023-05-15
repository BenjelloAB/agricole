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
        Schema::create('employe_recolte', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recolte_id');
            $table->unsignedBigInteger('employe_id');
            $table->timestamps();
            $table->foreign('recolte_id')->references('id')->on('recoltes')->onDelete('cascade');
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employe_recolte');
    }
};
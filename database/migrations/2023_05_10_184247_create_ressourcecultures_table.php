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
            $table->string('culture_id');
            $table->string('semences');
            $table->string('engrais');
            $table->string('pesticides');
            $table->string('machines_culture');
            // $table->foreign('culture_id')->references('id')->on('culturs');
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
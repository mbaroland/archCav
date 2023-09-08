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
        Schema::create('fichiers', function (Blueprint $table) {
            $table->id();
            $table->integer('id_projet')->nullable();
            $table->integer('id_archive')->nullable();
            $table->string('nom_fichier');
            $table->timestamps();
            $table->foreign('id_projet')->references('id')->on('projets');
            $table->foreign('id_archive')->references('id')->on('archives');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichiers');
    }
};

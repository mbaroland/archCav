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
        Schema::create('projet_realisateurs', function (Blueprint $table) {
            $table->integer('id_projet');
            $table->integer('id_realisateur');

            $table->foreign('id_projet')->references('id')->on('projets');
            $table->foreign('id_realisateur')->references('id')->on('realisateurs');
            $table->timestamps();
            $table->primary(['id_projet', 'id_realisateur']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projet_realisateurs');
    }
};

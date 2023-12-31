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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
           // $table->integer('id_zone');
            $table->integer('id_categorie');
            $table->integer('id_user');
            $table->string('titre_projet');
            $table->text('objectif_global');
            $table->text('objectif_specifiques');
            $table->string('financement')->nullable();
            $table->string('budjet');
            //$table->string('zone')->nullable();
            $table->string('date_debut');
            $table->string('date_fin');
            $table->foreign('id_categorie')->references('id')->on('categorie_projets')->cascadeOnDelete();
           // $table->foreign('id_zone')->references('id')->on('zones')->cascadeOnDelete();
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};

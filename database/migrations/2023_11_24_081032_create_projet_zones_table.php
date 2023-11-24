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
        Schema::create('projet_zones', function (Blueprint $table) {
            $table->integer('id_projet');
            $table->integer('id_zone');
            $table->foreign('id_projet')->references('id')->on('projets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_zone')->references('id')->on('zones')->cascadeOnDelete()->cascadeOnUpdate();

            $table->primary(['id_projet', 'id_zone']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projet_zones');
    }
};

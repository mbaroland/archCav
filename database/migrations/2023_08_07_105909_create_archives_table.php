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
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_type_archive');
            $table->integer('id_departement');
            $table->string('titre_archives');
            $table->string('contenue');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_type_archive')->references('id')->on('type_archives');
            $table->foreign('id_departement')->references('id')->on('departements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};

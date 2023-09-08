<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorieProjetsTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorie_projets')->insert([
            'nom_categorie' => 'Catégorie 1',
        ]);
        DB::table('categorie_projets')->insert([
            'nom_categorie' => 'Catégorie 2',
        ]);
    }
}

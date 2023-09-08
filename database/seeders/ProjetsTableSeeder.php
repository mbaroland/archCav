<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProjetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projets')->insert([
            'id_categorie' => 1,
            'id_user' => 1,
            'titre_projet' => 'Projet 1',
            'objectif_global' => 'Objectif global du projet 1',
            'objectif_specifiques' => 'Objectifs spécifiques du projet 1',
            'financement' => 'Financement du projet 1',
            'budjet' => 'Budget du projet 1',
            'zone' => 'Zone du projet 1',
            'date_debut' => '2023-01-01',
            'date_fin' => '2023-12-31',

        ]);
        DB::table('projets')->insert([
            'id_categorie' => 2,
            'id_user' => 2,
            'titre_projet' => 'Projet 2',
            'objectif_global' => 'Objectif global du projet 1',
            'objectif_specifiques' => 'Objectifs spécifiques du projet 1',
            'financement' => 'Financement du projet 1',
            'budjet' => 'Budget du projet 1',
            'zone' => 'Zone du projet 1',
            'date_debut' => '2022-01-01',
            'date_fin' => '2022-01-05',

        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('archives')->insert([
            'id_user' => 1,
            'id_type_archive' => 1,
            'id_departement' => 1,
            'titre_archives' => 'Archives 1',
            'contenue' => 'Contenu des archives 1',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ZonesTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('zones')->insert([
            'nom_zone' => 'Sokodé',
        ]);
        DB::table('zones')->insert([
            'nom_zone' => 'Tchamba',
        ]);
        DB::table('zones')->insert([
            'nom_zone' => 'Sotouboua',
        ]);
    }
}

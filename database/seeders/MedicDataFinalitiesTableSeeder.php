<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicDataFinalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [ 'name' => 'Prestación de Servicios Médicos', 'code' => 1 ],
            [ 'name' => 'Elaboración y conservación de Historias Clínicas', 'code' => 2 ],
            [ 'name' => 'Fines de Investigación Científica', 'code' => 3 ],
        ];

        DB::table('medic_data_porposes')->insert($activities);
    }
}

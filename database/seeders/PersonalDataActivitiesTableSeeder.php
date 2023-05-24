<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalDataActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [ 'name' => 'Elaboración de perfiles' ],
            [ 'name' => 'Campañas de publicidad masiva' ],
            [ 'name' => 'Actividades de E-commerce o comercio electrónico' ],
            [ 'name' => 'Venta de medicamentos' ],
            [ 'name' => 'Manejo de historias clínicas' ]
        ];

        DB::table('personal_data_activities')->insert($activities);
    }
}

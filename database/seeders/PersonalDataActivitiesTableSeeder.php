<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $others = Category::where('code', 1)->first();
        $medic = Category::where('code', 2)->first();

        $activities = [
            [ 'name' => 'Elaboración de perfiles', 'category_id' => $others->id ],
            [ 'name' => 'Campañas de publicidad masiva', 'category_id' => $others->id ],
            [ 'name' => 'Actividades de E-commerce o comercio electrónico', 'category_id' => $others->id ],
            [ 'name' => 'Venta de medicamentos', 'category_id' => $medic->id ],
            [ 'name' => 'Manejo de historias clínicas', 'category_id' => $medic->id ]
        ];

        DB::table('personal_data_activities')->insert($activities);
    }
}

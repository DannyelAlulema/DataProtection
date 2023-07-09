<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $others = Category::where('code', 1)->first();
        $medic = Category::where('code', 2)->first();

        $sectors = [
            [ 'name' => 'Salud: Hospitales, clínicas y consultorios médicos', 'category_id' => $medic->id ],
            [ 'name' => 'Financiero', 'category_id' => $others->id ],
            [ 'name' => 'Economía Popular y Solidaria: Todo tipo de Cooperativas', 'category_id' => $others->id ],
            [ 'name' => 'Actividades políticas o religiosas', 'category_id' => $others->id ],
            [ 'name' => 'Seguros: Seguros y reaseguros de todo tipo, incluido brokers.', 'category_id' => $others->id ],
            [ 'name' => 'Intermediación de Servicios Complementarios: Servicios de intermediación laboral, manejo de nómina, seguridad privada', 'category_id' => $others->id ],
            [ 'name' => 'Servicios Sociales y de Asistencia a personas', 'category_id' => $others->id ],
            [ 'name' => 'Publicidad', 'category_id' => $others->id ],
            [ 'name' => 'Seguridad Privada', 'category_id' => $others->id ],
        ];
        DB::table('sectors')->insert($sectors);
    }
}

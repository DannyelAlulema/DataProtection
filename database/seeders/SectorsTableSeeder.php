<?php

namespace Database\Seeders;

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
        $sectors = [
            [ 'name' => 'Salud: Hospitales, clínicas y consultorios médicos' ],
            [ 'name' => 'Financiero' ],
            [ 'name' => 'Economía Popular y Solidaria: Todo tipo de Cooperativas' ],
            [ 'name' => 'Actividades políticas o religiosas' ],
            [ 'name' => 'Seguros: Seguros y reaseguros de todo tipo, incluido brokers.' ],
            [ 'name' => 'Intermediación de Servicios Complementarios: Servicios de intermediación laboral, manejo de nómina, seguridad privada' ],
            [ 'name' => 'Servicios Sociales y de Asistencia a personas' ],
            [ 'name' => 'Publicidad' ],
            [ 'name' => 'Seguridad Privada' ],
        ];
        DB::table('sectors')->insert($sectors);
    }
}

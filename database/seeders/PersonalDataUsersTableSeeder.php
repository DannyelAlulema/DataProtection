<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalDataUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uses = [
            [ 'name' => 'Datos que se revelen origen étnico o racial' ],
            [ 'name' => 'Datos sobre determinación políticas o religión' ],
            [ 'name' => 'Datos genéticos' ],
            [ 'name' => 'Datos biométricos dirigidos a identificar a una persona' ],
            [ 'name' => 'Datos de salud física o mental' ],
            [ 'name' => 'Datos relativos a la vida sexual o a la orientación sexual' ],
            [ 'name' => 'Datos sobre condición migratoria' ],
            [ 'name' => 'Datos relativos a antecedentes penales' ],
            [ 'name' => 'Datos sobre Geolocalización' ],
        ];

        DB::table('personal_data_uses')->insert($uses);
    }
}

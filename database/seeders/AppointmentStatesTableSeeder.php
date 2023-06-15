<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            [
                'name' => 'SUBMMITED',
                'code' => 1,
                'alias' => 'Solicitada',
            ],
            [
                'name' => 'ATTENDED',
                'code' => 2,
                'alias' => 'Atendida',
            ],
        ];

        DB::table('appointment_states')->insert($states);
    }
}

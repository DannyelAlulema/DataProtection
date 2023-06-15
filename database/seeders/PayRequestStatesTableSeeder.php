<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayRequestStatesTableSeeder extends Seeder
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
                'alias' => 'Solicitado',
            ], [
                'name' => 'APPROVED',
                'code' => 2,
                'alias' => 'Aprovado',
            ], [
                'name' => 'DENIED',
                'code' => 3,
                'alias' => 'Denegado',
            ],
        ];

        DB::table('pay_request_states')->insert($states);
    }
}

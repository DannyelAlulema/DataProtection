<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectors = [
            [
                'name' => 'Varios',
                'code' => 1
            ],
            [
                'name' => 'Salud',
                'code' => 2
            ]
        ];
        DB::table('categories')->insert($sectors);
    }
}

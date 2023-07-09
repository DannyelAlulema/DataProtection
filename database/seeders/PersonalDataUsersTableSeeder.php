<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $others = Category::where('code', 1)->first();
        $medic = Category::where('code', 2)->first();

        $uses = [
            [ 'name' => 'Datos que se revelen origen étnico o racial', 'category_id' => $others->id ],
            [ 'name' => 'Datos sobre determinación políticas o religión', 'category_id' => $others->id ],
            [ 'name' => 'Datos genéticos', 'category_id' => $medic->id ],
            [ 'name' => 'Datos biométricos dirigidos a identificar a una persona', 'category_id' => $others->id ],
            [ 'name' => 'Datos de salud física o mental', 'category_id' => $medic->id ],
            [ 'name' => 'Datos relativos a la vida sexual o a la orientación sexual', 'category_id' => $medic->id ],
            [ 'name' => 'Datos sobre condición migratoria', 'category_id' => $others->id ],
            [ 'name' => 'Datos relativos a antecedentes penales', 'category_id' => $others->id ],
            [ 'name' => 'Datos sobre Geolocalización', 'category_id' => $others->id ],
        ];

        DB::table('personal_data_uses')->insert($uses);
    }
}

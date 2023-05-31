<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleTableSeeder::class,
            UserTableSeeder::class,
            SectorsTableSeeder::class,
            PersonalDataActivitiesTableSeeder::class,
            PersonalDataUsersTableSeeder::class
        ]);

        $users = User::factory(10)->create();

        foreach ($users as $user)
            $user->assignRole('customer');
    }
}

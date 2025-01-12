<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            WorkTypeSeeder::class,
            SkillSeeder::class,
            CitySeeder::class,
            EducationSeeder::class,
            WorkScheduleSeeder::class,
            ExperienceSeeder::class,
        ]);
    }
}

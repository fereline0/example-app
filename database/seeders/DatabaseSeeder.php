<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SocialInfoSeeder::class,
            UserSeeder::class,
            WorkTypeSeeder::class,
            SkillSeeder::class,
            CitySeeder::class,
            BackgroundSeeder::class,
            WorkScheduleSeeder::class,
            ExperienceSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    public function run()
    {
        $experiences = [
            'Не имеет значения',
            'Нет опыта',
            'От 1 года до 3 лет',
            'От 3 до 6 лет',
            'Более 6 лет',
        ];

        foreach ($experiences as $experience) {
            Experience::create(['name' => $experience]);
        }
    }
}

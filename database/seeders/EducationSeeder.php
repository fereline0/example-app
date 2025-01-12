<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    public function run()
    {
        $educations = [
            'Не требуется',
            'Среднее профессиональное',
            'Высшее'
        ];

        foreach ($educations as $education) {
            Education::create(['name' => $education]);
        }
    }
}

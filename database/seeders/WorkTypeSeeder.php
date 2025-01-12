<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkType;

class WorkTypeSeeder extends Seeder
{
    public function run()
    {
        $workTypes = [
            'Удаленная работа',
            'Полный день',
            'Сменный график',
            'Вахтовый метод',
        ];

        foreach ($workTypes as $workType) {
            WorkType::create(['name' => $workType]);
        }
    }
}

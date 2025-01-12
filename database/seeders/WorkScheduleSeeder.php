<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkSchedule;

class WorkScheduleSeeder extends Seeder
{
    public function run()
    {
        $schedules = [
            'Договорное',
            'Пятидневный график работы',
            '2/2',
            '1/3',
            '6/1'
        ];

        foreach ($schedules as $schedule) {
            WorkSchedule::create(['name' => $schedule]);
        }
    }
}

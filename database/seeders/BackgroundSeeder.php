<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Background;

class BackgroundSeeder extends Seeder
{
    public function run()
    {
        $backgrounds = [
            'Отсутсвует',
            'Среднее профессиональное',
            'Высшее'
        ];

        foreach ($backgrounds as $background) {
            Background::create(['name' => $background]);
        }
    }
}

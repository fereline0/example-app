<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            'PHP',
            'JavaScript',
            'Python',
            'Java',
            'C#',
            'Ruby',
            'HTML',
            'CSS',
            'SQL',
            'Git',
            'Коммуникация',
            'Работа в команде',
            'Критическое мышление',
            'Управление временем',
            'Адаптивность',
            'Лидерство',
            'Креативность',
            'Аналитические навыки',
            'Презентационные навыки',
            'Навыки решения проблем'
        ];

        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }
    }
}

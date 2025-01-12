<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            'Москва',
            'Санкт-Петербург',
            'Новосибирск',
            'Екатеринбург',
            'Нижний Новгород',
            'Казань',
            'Челябинск',
            'Омск',
            'Самара',
            'Ростов-на-Дону',
            'Уфа',
            'Красноярск',
            'Воронеж',
            'Пермь',
            'Волгоград',
            'Саратов',
            'Тюмень',
            'Тольятти',
            'Ижевск',
            'Барнаул'
        ];

        foreach ($cities as $city) {
            City::create(['name' => $city]);
        }
    }
}

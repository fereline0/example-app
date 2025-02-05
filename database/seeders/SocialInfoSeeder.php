<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialInfo;

class SocialInfoSeeder extends Seeder
{
    public function run()
    {
        SocialInfo::truncate();

        SocialInfo::create([
            'vk' => 'https://vk.com/polnalyubvi',
            'tg' => 'https://t.me/s/polnalyubvitg',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    public function run()
    {
        ContactInfo::truncate();

        ContactInfo::create([
            'email' => 'support@yourwebsite.com',
            'phone' => '+1 (234) 567-890',
        ]);
    }
}

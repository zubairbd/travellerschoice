<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            [
                'id'    => 1,
                'logo' => 'logo-dark.png',
                'favicon' => 'favicon.png',
                'welcome_txt' => 'Travellsers Choice',
            ],
        ];

        Setting::insert($setting);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $faker = Faker::create();

    	// foreach (range(1,10) as $index) {
        //     DB::table('passengers')->insert([
        //         'policy_number' => $faker->numerify('VS1229###'),
        //         'name' => $faker->name,
        //         'pp_number' => $faker->numerify('AB#######'),
        //         'dob' => $faker->date($format = 'd/m/Y', $max = '2000',$min = '1990'),
        //         'destination' => $faker->country,
        //         'effective_date' => $faker->date($format = 'd/m/Y', $max = '2022',$min = '2021'),
        //         'termination_date' => $faker->date($format = 'd/m/Y', $max = '2022',$min = '2021'),
        //         'created_at' => today(),
        //     ]);
        // }

        
        $admin = User::where('email', 'superadmin@gmail.com')->first();

        if(is_null($admin)){
            $admin = new User();
            $admin->name = "Super Admin";
            $admin->email = "superadmin@gmail.com";
            $admin->role = "A";
            $admin->password = Hash::make('1234');
            $admin->save();
        }
    }
}

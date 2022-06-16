<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
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
        //     DB::table('Insurances')->insert([
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
            $admin->username = "superadmin";
            $admin->role = "A";
            $admin->status = 1;
            $admin->password = Hash::make('1234');
            $admin->save();

            DB::table('users')->insert([

                [
                    'name' => 'Kazi Zubair Misbah',
                    'email' => 'zubairnarcissus@gmail.com',
                    'username' => 'zubairnarcissus',
                    'role' => 'AG',
                    'status' => 1,
                    'password' => Hash::make('1234'),
                    'created_at' => today(),
                ],
                [
                    'name' => 'User',
                    'email' => 'user@gmail.com',
                    'username' => 'user',
                    'role' => 'U',
                    'status' => 1,
                    'password' => Hash::make('1234'),
                    'created_at' => today(),
                ],

            ]);
        }


        // check if table users is empty
        
        if(DB::table('products')->count() == 0){

            DB::table('products')->insert([

                [
                    'name' => 'Worldtrips',
                    'slug' => 'Worldtrips',
                    'price' => 300,
                    'description' => '',
                    'status' => 1,
                    
                ],
                [
                    'name' => 'We Care',
                    'slug' => 'WeCare',
                    'price' => 300,
                    'description' => '',
                    'status' => 1,
                ],

            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    
        $this->call(SettingTableSeeder::class);
    }
}

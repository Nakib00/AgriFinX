<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\farmer;
use Faker\Factory as Faker;

class sentdata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // farmer seed
        // foreach (range(1, 20) as $index) {
        //     Farmer::create([
        //         'f_name' => $faker->firstName,
        //         'l_name' => $faker->lastName,
        //         'email' => $faker->email,
        //         'nid' => sprintf('%010d', mt_rand(0, 9999999999)),
        //         'phone' => $faker->numerify('###########'),
        //         'address' => $faker->address,
        //         'dateofbirth' => $faker->date($format = 'Y-m-d', $max = 'now')
        //     ]);
        // }
    }
}

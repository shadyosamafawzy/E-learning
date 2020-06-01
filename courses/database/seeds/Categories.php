<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0 ;$i<= 20; $i++)
        {
            $array = [
              'name' => $faker->name,
              'meta_des' => $faker->sentence,
              'meta_keywords' => $faker->sentence,
            ];

            \App\Models\Category::create($array);
        }
    }
}

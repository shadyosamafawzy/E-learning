<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Comments extends Seeder
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
                'comment' => $faker->sentence,
                'video_id' => rand(1,19),
                'user_id' => 1,
            ];


            \App\Models\Comments::create($array);
        }
    }
}

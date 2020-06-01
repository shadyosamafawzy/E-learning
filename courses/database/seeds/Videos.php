<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Videos extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19];
        $youtube = [
            'https://www.youtube.com/watch?v=4Tr0otuiQuU',
            'https://www.youtube.com/watch?v=DyDfgMOUjCI',
            'https://www.youtube.com/watch?v=V1Pl8CzNzCw',
            'https://www.youtube.com/watch?v=lWsO41YkYpY'
        ];
        $faker = Faker::create();

        for($i = 0 ;$i<= 20; $i++)
        {
            $array = [
                'name' => $faker->name,
                'meta_des' => $faker->sentence,
                'des' => $faker->paragraph,
                'meta_keywords' => $faker->sentence,
                'cat_id' => rand(1,19),
                'user_id' => 1,
                'published' => rand(0,1),
                'youtube' => $youtube[rand(0,3)],
                'image' => 'download.jpg'
            ];

            $video = \App\Models\Video::create($array);
            $video->skills()->sync(array_rand($ids,2));
            $video->tags()->sync(array_rand($ids,2));
        }
    }
}

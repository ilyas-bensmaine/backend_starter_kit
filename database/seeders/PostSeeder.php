<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Post::factory(50)->create();
        $pathToFile = public_path('img/example.png');


        foreach (Post::all() as $post) {
            $post->addMedia($pathToFile)
                ->preservingOriginal()
                ->toMediaCollection('post_img');
            $post->part_categories()->attach([random_int(1, 10 ) , random_int(1, 10),random_int(1, 10),random_int(1, 10)]);
            $post->part_sub_categories()->attach(random_int(1, 10));
            $post->parts()->attach([random_int(1, 10)]);
            $post->car_brands()->attach([random_int(1, 10 ) , random_int(1, 10),random_int(1, 10),random_int(1, 10)]);
            $post->car_types()->attach([1]);
            $post->car_models()->attach([random_int(1, 10)]);
            $post->part_brands()->attach([random_int(1, 10)]);

            $random_number_array = range(0, 50);
            shuffle($random_number_array);
            $random_number_array = array_slice($random_number_array, 0, 10);
            $post->viewers()->attach($random_number_array);
            foreach ($post->viewers as $key => $viewer) {
                $viewer->pivot->saved = random_int(0,1);
            }
            $post->push();
        }
    }
}

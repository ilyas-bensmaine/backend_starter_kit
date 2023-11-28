<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'             => $this->faker->sentence(4),
            'content'           => $this->faker->sentence(15),
            'price'             => random_int(100 , 20000),
            'user_id'           => random_int(1 , 10),
            'wilaya_id'         => random_int(1 , 58),
            'post_type_id'      => 1,
            'post_status_id'      => 1
        ];
    }
}

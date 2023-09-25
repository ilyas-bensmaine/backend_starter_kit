<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'           => $this->faker->sentence(15),
            'price'             => random_int(100 , 20000),
            'user_id'           => random_int(1 , 50),
            'wilaya_id'         => random_int(1 , 58),
            'post_id'      =>  random_int(1 , 50),
            'post_response_status_id'      => 1
        ];
    }
}

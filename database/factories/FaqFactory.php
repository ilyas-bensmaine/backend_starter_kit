<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    protected $model = Faq::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question'              => $this->faker->sentence(4).'?',
            'arabic_question'       => 'arabic '.$this->faker->sentence(4),
            'response'             => $this->faker->sentence(15). "<a href = 'https://google.com' ></a>",
            'arabic_response'      => 'arabic '.$this->faker->sentence(15),
            'active'               => 1
        ];
    }
}

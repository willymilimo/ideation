<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoryName' => $this->faker->realText(100), 
            'categoryDescriptions' => $this->faker->realText(100),
        ];
    }
}

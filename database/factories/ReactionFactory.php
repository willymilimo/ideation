<?php

namespace Database\Factories;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'thumbsUP' => $this->faker->numberBetween(0,9), 
            'thumbsDown' => $this->faker->numberBetween(0,9),  
            'ideaID' => null,
        ];
    }
}

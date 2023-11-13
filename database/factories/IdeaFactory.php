<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Department;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'staffId' => User::all()->random()->id, 
            'title' => $this->faker->realText(30), 
            'reactionID' => Reaction::all()->random()->id, 
            'viewCount' => $this->faker->numberBetween(0,20), 
            'status' => $this->faker->numberBetween(1,2), 
            'categoryID' => Category::all()->random()->id, 
            'departmentID' => Department::all()->random()->id, 
            'idealDetails' => $this->faker->realText(200),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'departmentName' => $this->faker->realText(50), 
            'qaCoodinatorID' => User::all()->random()->id,
        ];
    }
}

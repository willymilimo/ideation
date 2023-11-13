<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RolesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            ['id' => 1, 'roleName' => 'Administrator'],
            ['id' => 2, 'roleName' => 'QA Coordinator'],
            ['id' => 3, 'roleName' => 'Staff'],
            ['id' => 4, 'roleName' => 'Quality Assurance Manager'],
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => Str::snake($this->faker->unique()->name()),
        ];
    }
}

/**
 * quick use with tinker:
 * 
 * \Database\Factories\UserFactory::new()->create()
 * \Database\Factories\UserFactory::times(3)->create()
 */


<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentences(3, true),
            'user_id' => fn () => UserFactory::new()->create()->id,
        ];
    }
}

/**
 * quick use with tinker:
 * 
 * \Database\Factories\PostFactory::new()->create()
 * \Database\Factories\PostFactory::times(3)->create()
 */

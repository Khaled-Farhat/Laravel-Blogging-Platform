<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'body' => $this->faker->paragraph(),
            'reviewed_at' => ($this->faker->boolean(50) ? now() : null),
        ];
    }
}

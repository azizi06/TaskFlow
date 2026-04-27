<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array {
        return [
            'title'       => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'due_date'    => $this->faker->dateTimeBetween('now', '+1 month'),
            'priority'    => $this->faker->randomElement(['basse', 'moyenne', 'haute']),
            'status'      => $this->faker->randomElement(['a_faire', 'en_cours', 'terminee']),
        ];
    }
}
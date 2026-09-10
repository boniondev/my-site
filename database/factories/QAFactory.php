<?php

namespace Database\Factories;

use App\Models\QA;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<QA>
 */
class QAFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, string, bool>
     */
    public function definition(): array
    {
        return [
            'question' => fake()->words(10, true),
            'answer' => fake()->words(10, true),
            'hidden' => false,
        ];
    }
}

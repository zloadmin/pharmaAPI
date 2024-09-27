<?php

namespace Database\Factories;

use App\Enums\Ticket\TicketLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number'                    => '#' . rand(1, 1000),
            'title'                     => fake()->word(),
            'description_path'          => fake()->filePath(),
            'description_original_name' => pathinfo(fake()->filePath(), PATHINFO_BASENAME),
            'article_path'              => fake()->filePath(),
            'article_original_name'     => pathinfo(fake()->filePath(), PATHINFO_BASENAME),
            'level'                     => TicketLevel::random()
        ];
    }
}

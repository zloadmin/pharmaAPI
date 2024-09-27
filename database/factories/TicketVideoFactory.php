<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketVideo>
 */
class TicketVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_id'  => Ticket::factory(),
            'name'       => fake()->name,
            'stage_name' => fake()->name,
            'url'        => fake()->url,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\Component\ComponentType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Component>
 */
class ComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => fake()->name(),
            'type'        => ComponentType::random(),
            'description' => 'Посуда для точного взвешивания выбранных веществ',
            'image'       => sprintf('storage_components/%d.jpg', rand(1, 5)),
            'short_name' => Str::limit(fake()->name, 15),
            'padding_top'   => fake()->randomFloat(3, 20, 30),
            'padding_right' => fake()->randomFloat(3, 20, 30),
        ];
    }
}

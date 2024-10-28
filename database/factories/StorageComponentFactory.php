<?php

namespace Database\Factories;

use App\Enums\StorageComponent\StorageComponentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StorageComponent>
 */
class StorageComponentFactory extends Factory
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
            'type'        => StorageComponentType::random(),
            'description' => 'Посуда для точного взвешивания выбранных веществ'
        ];
    }
}

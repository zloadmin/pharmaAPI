<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends UserFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Admin::class;
//    /**
//     * Define the model's default state.
//     *
//     * @return array<string, mixed>
//     */
//    public function definition(): array
//    {
//        return [
//            //
//        ];
//    }
}

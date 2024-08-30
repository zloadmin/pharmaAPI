<?php

namespace Database\Factories;

use App\Enums\Student\EducationMode;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends UserFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name'      => fake()->firstName() . ' ' . fake()->lastName(),
            'email'          => fake()->unique()->safeEmail(),
            'password'       => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'teacher_id'     => rand(0, 1) ? Teacher::factory() : null,
            'date_of_birth'  => now()->subDays(rand(365 * 18, 365 * 99))->toDateString(),
            'education_mode' => EducationMode::random()
        ];
    }
}

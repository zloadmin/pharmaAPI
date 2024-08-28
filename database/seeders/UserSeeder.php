<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use SoulDoit\SetEnv\Env;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::factory()->create([
            'email'    => 'admin@test.com',
            'password' => Hash::make('password')
        ]);
        $accessToken = $admin->createToken('seeder');
        $envService = new Env();
        $envService->set("SCRIBE_AUTH_KEY", $accessToken->plainTextToken);

        Teacher::factory()->create([
            'email'    => 'teacher@test.com',
            'password' => Hash::make('password')
        ]);
        Student::factory()->create([
            'email'    => 'student@test.com',
            'password' => Hash::make('password')
        ]);


        Admin::factory(10)->create();
        Teacher::factory(10)->create();
        Student::factory(10)->create();
    }
}

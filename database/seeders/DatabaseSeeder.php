<?php

namespace Database\Seeders;

use App\Enums\Ticket\TicketLevel;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\LaboratoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LaboratorySessionSeeder::class,
            DepartmentSeeder::class,
            UserSeeder::class,
            GroupSeeder::class,
            TicketSeeder::class,
            StorageComponentSeeder::class,
            LaboratorySeeder::class
        ]);
    }
}

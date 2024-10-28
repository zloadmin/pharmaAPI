<?php

namespace Database\Seeders;

use App\Models\LaboratorySession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaboratorySessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LaboratorySession::factory(10)->create();
    }
}

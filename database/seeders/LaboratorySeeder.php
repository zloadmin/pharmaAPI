<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Laboratory::factory()->create(['name' => 'Аминосалициловая кислота Легкий', 'description' => 'Аминосалициловая кислота известна как противотуберкулезный антибиотик. Она действует, останавливая или замедляя рост бактерий . Этот антибиотик лечит только бактериальные инфекции. Он не будет работать при вирусных инфекциях (таких как простуда, грипп).']);
        Laboratory::factory(5)->create();
    }
}

<?php

namespace App\Console\Commands\Laboratory;

use App\Models\Laboratory;
use Illuminate\Console\Command;

class CreateLaboratories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-laboratories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $names = [
            'Аминосалициловая кислота Легкий',
            'Аминосалициловая Сложный',
            'Лозартан Легкий',
            'Лозартан Сложный',
            'Дарунавир Легкий',
            'Дарунавир Сложный',
            'Бикалутамид сложный',
            'Молнупиравир легкий',
            'Молнупиравир сложный',
        ];

        $originLaboratory = Laboratory::oldest()->first();
        $originLaboratory->load([
            'components'
        ]);
        foreach ($names as $name) {

            $newLaboratory = $originLaboratory->replicate();
            $newLaboratory->name = $name;
            $newLaboratory->description = $name;
            $newLaboratory->push();
            $compIds = $originLaboratory->components()->pluck('id')->toArray();
            $newLaboratory->components()->sync($compIds);
//            foreach ( as $component) {
//                $newComponent = $component->replicate();
//                $newComponent->laboratory_id = $newLaboratory->id;
//                $newLaboratory->push();
//            }
        }
    }
}

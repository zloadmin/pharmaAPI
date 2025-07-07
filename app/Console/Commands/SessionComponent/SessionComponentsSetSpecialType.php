<?php

namespace App\Console\Commands\SessionComponent;

use App\Enums\SessionComponent\SessionComponentType;
use App\Models\Component;
use App\Models\SessionComponent;
use Illuminate\Console\Command;

class SessionComponentsSetSpecialType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session-components:set-special-type';

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
        $specialIds = Component::where('is_special', 1)->pluck('id')->toArray();

        SessionComponent::whereIn('component_id', $specialIds)
            ->where('type', SessionComponentType::Simple)
            ->update([ 'type' => SessionComponentType::SpecialStaff ]);
    }
}

<?php

namespace App\Livewire\Stages\WeightingStage;

use App\Enums\SessionComponent\SessionComponentPlace;
use App\Livewire\Traits\HasSession;
use App\Models\Component;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component as LivewireComponent;

class WeightingStage extends LivewireComponent
{
    use HasSession;

    public Collection $components;

    public function mount(string $session): void
    {
        $this->setSession($session);
    }


    #[Layout('components.layouts.web')]
    public function render()
    {
        return view('livewire.stages.weighting-stage.weighting-stage');
    }

}

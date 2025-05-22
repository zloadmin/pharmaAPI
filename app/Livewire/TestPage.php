<?php

namespace App\Livewire;

use App\Livewire\IndexPage\HasTestCases;
use App\Models\Laboratory;
use App\Models\LaboratorySession;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TestPage extends Component
{
    use HasTestCases;

    #[Layout('components.layouts.app-simple')]
    public function render()
    {
        return view('livewire.test-page');
    }

}

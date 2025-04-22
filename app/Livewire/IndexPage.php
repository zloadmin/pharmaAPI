<?php

namespace App\Livewire;

use App\Livewire\IndexPage\HasTestCases;
use App\Models\Laboratory;
use App\Models\LaboratorySession;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexPage extends Component
{
    use HasTestCases;
    public Collection $laboratories;

    public function mount()
    {
        $this->laboratories = Laboratory::query()->orderBy('name')->get();
    }
    #[Layout('components.layouts.app-simple')]
    public function render()
    {
        return view('livewire.index-page');
    }
    public function start($id)
    {
        $laboratory = Laboratory::find($id);
        if($laboratory) {
            $sessionUUID = LaboratorySession::start($laboratory);
            return redirect()->route('index-stage', $sessionUUID);
        }
    }
}

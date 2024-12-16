<?php

namespace App\Livewire\Stages\ChromatographStage\SoftwarePages;

use App\Livewire\Traits\HasSession;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ChromatographStatusPage extends Component
{
    use HasSession;
    public $activeTab = 'chromatograph-status-page';

    public function mount($session)
    {
        $this->setSession($session);
    }

    #[Layout('components.layouts.web-chromatograph')]
    public function render()
    {
        return view('livewire.stages.chromatograph-stage.software-pages.chromatograph-status-page')->layoutData([
            'activeTab' => 'chromatograph-status-page',
            'session'   => $this->session
        ]);
    }
}

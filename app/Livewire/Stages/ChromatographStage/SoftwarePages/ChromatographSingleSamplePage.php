<?php

namespace App\Livewire\Stages\ChromatographStage\SoftwarePages;

use App\Livewire\Traits\HasSession;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ChromatographSingleSamplePage extends Component
{
    use HasSession;
    public $activeTab = 'chromatograph-single-sample-page';


    public function mount($session)
    {
        $this->setSession($session);
    }

    #[Layout('components.layouts.web-chromatograph')]
    public function render()
    {
        return view('livewire.stages.chromatograph-stage.software-pages.chromatograph-single-sample-page')->layoutData([
            'activeTab' => 'chromatograph-single-sample-page',
            'session'   => $this->session
        ]);
    }

}

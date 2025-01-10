<?php

namespace App\Livewire\Stages\ChromatographStage\SoftwarePages;


use App\Livewire\Traits\HasSession;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ChromatographResultPage extends Component
{
    use HasSession;
    use ChromatographForm;

    public $activeTab = 'chromatograph-result-page';

    public function mount($session)
    {
        $this->setSession($session);
    }


    #[Layout('components.layouts.web-chromatograph')]
    public function render()
    {
        return view('livewire.stages.chromatograph-stage.software-pages.chromatograph-result-page')->layoutData([
            'activeTab' => 'chromatograph-result-page',
            'session'   => $this->session
        ]);
    }
}

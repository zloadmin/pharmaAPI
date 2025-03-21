<?php

namespace App\Livewire\Stages\ChromatographStage\SoftwarePages;


use App\Livewire\Traits\HasSession;
use App\Models\Laboratory;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ChromatographMethodPage extends Component
{
    use HasSession;
    use ChromatographForm;

    public $activeTab = 'chromatograph-method-page';

    public array $tabs = [
        'pump' => [
            'title'  => 'Бинарный насос',
            'isShow' => true,
        ],
        'col'  => [
            'title'  => 'Колоночный отд',
            'isShow' => false,
        ],
        'dad'  => [
            'title'  => 'DAD',
            'isShow' => false,
        ],
    ];

    public array $tableItems = [];
    public function mount($session)
    {
        $this->setSession($session);
        $this->setTableItems();
    }

    public function showTab(string $key): void
    {
        $this->save();
        $this->hideAllTabs();
        $this->showSingleTab($key);
    }

    private function hideAllTabs(): void
    {
        foreach ($this->tabs as $tabKey => $tabData) {
            $this->tabs[$tabKey]['isShow'] = false;
        }
    }

    private function showSingleTab(string $key): void
    {
        $this->tabs[$key]['isShow'] = true;
    }

    #[Layout('components.layouts.web-chromatograph')]
    public function render()
    {
        return view('livewire.stages.chromatograph-stage.software-pages.chromatograph-method-page')->layoutData([
            'activeTab' => 'chromatograph-method-page',
            'session' => $this->session
        ]);
    }

    private function setTableItems()
    {
        foreach(Laboratory::$chromatographTableItemTypes as $type => $data) {

        }
    }
}

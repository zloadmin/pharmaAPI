<?php

namespace App\Livewire\Admin\Pages\Group;

use App\Livewire\Admin\Traits\HasBreadcrumb;
use Livewire\Attributes\Title;
use Livewire\Component;

class GroupsPage extends Component
{


    use HasBreadcrumb;

    #[Title('Группы')]
    public function render()
    {

        return view('livewire.admin.pages.group.groups-page')->layoutData([
            'breadcrumb' => $this->getGroupsPageItem()
        ]);
    }

}

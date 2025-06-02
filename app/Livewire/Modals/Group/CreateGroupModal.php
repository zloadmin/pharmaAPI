<?php

namespace App\Livewire\Modals\Group;


use App\Livewire\Traits\HasEvents;
use App\Models\Group;
use Livewire\Component;

class CreateGroupModal extends Component
{

    use HasEvents;
    use HasGroupForm;

    public function render()
    {
        return view('livewire.modals.group.create-group-modal');
    }

    public function save(): void
    {
        $this->validate();
        $this->createGroup();
        $this->hideModal();
        $this->refreshGroupsTable();
    }

    private function createGroup(): void
    {
        Group::create([
            'name' => $this->name,
        ]);
    }
}

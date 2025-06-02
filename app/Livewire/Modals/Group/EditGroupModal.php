<?php

namespace App\Livewire\Modals\Group;

use App\Livewire\Traits\HasEvents;
use App\Models\Group;
use App\Models\Student;
use Livewire\Component;

class EditGroupModal extends Component
{
    use HasGroupForm;
    use HasEvents;

    public Group $group;

    public function mount(int $groupId): void
    {
        $this->group = Group::findOrFail($groupId);
        $this->loadModel($this->group);
    }

    public function render()
    {
        return view('livewire.modals.group.edit-group-modal');
    }

    public function save(): void
    {
        $this->validate();
        $this->updateGroup();
        $this->hideModal();
        $this->refreshGroupsTable();
    }

    private function updateGroup(): void
    {
        $this->group->update([
            'name' => $this->name,
        ]);
    }

}

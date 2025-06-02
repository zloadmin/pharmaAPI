<?php

namespace App\Livewire\DataTables;

use App\Livewire\DataTables\Traits\HasColumns;
use App\Livewire\DataTables\Traits\HasFilters;
use App\Livewire\Traits\HasEvents;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

/**
 * @method dispatch(string $EVENT_HIDE_MODAL)
 */
class GroupsTable extends DataTableComponent
{
    use HasFilters;
    use HasColumns;
    use HasEvents;
    public int|null $current_teacher_id = null;
//    protected $model = Student::class;

    public function builder(): Builder
    {
        return Group::query();
    }


    public function mount()
    {

    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setToolBarDisabled();
        $this->setLayout('components.layouts.app-full');
    }

    public function filters(): array
    {
        return [
            $this->getNameFilter(),
        ];
    }

    public function columns(): array
    {
        return [
            $this->getIdColumn(),
            $this->getNameColumn(),
            $this->getActionColumn()
        ];
    }


    #[On(self::EVENT_REFRESH_GROUPS_TABLE)]
    public function refreshTable(): void
    {
        $this->mount();
    }

    public function deleteGroup($id): void
    {
        $student = Group::find($id);
        $student?->delete();
        $this->refreshTable();
    }

    public function getActionHTML(Group $group): string
    {

        $click = "\$dispatch('showModal', {data: {'alias' : 'modals.group.edit-group-modal','params' :{'groupId': $group->id}}})";
        $editRoute = '';
        return <<<HTML

           <nobr>
            <button type="button"  wire:click="$click" class="btn btn-link action-icon" >
                <i class="mdi mdi-pencil"></i>
            </button>

                <a href="#" class="action-icon"
                        wire:click.prevent="deleteGroup($group->id)"
                        wire:confirm="Удалить группу?"
                >
                    <i class="mdi mdi-delete"></i>
                </a>
            </nobr>

        HTML;
    }


}

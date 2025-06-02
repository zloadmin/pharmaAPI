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
class TeachersTable extends DataTableComponent
{
    use HasFilters;
    use HasColumns;
    use HasEvents;

//    protected $model = Student::class;

    public function builder(): Builder
    {
        return Teacher::query();
    }


    public function mount(int $teacher_id = null)
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
            $this->getIdFilter(),
            $this->getFullNameFilter(),
            $this->getEmailFilter(),
            $this->getGroupFilter()
        ];
    }

    public function columns(): array
    {
        return [
            $this->getIdColumn(),
            $this->getFullNameColumn(),
            $this->getEmailColumn(),
            $this->getGroupColumn(),
            $this->getActionColumn()
        ];
    }


    #[On(self::EVENT_REFRESH_TEACHERS_TABLE)]
    public function refreshTable(): void
    {
        $this->mount();
    }

    public function deleteTeacher($id): void
    {
        $teacher = Teacher::find($id);
        $teacher?->delete();
        $this->refreshTable();
    }


    public function getActionHTML(Teacher $teacher): string
    {

        $click = "\$dispatch('showModal', {data: {'alias' : 'modals.teacher.edit-teacher-modal','params' :{'teacherId': $teacher->id}}})";
        $editRoute = '';
        return <<<HTML

           <nobr>
            <button type="button"  wire:click="$click" class="btn btn-link action-icon" >
                <i class="mdi mdi-pencil"></i>
            </button>

                <a href="#" class="action-icon"
                        wire:click.prevent="deleteTeacher($teacher->id)"
                        wire:confirm="Удалить преподавателя?"
                >
                    <i class="mdi mdi-delete"></i>
                </a>
            </nobr>

        HTML;
    }


}

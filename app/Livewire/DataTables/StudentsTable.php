<?php

namespace App\Livewire\DataTables;

use App\Livewire\DataTables\Traits\HasColumns;
use App\Livewire\DataTables\Traits\HasFilters;
use App\Livewire\Traits\HasEvents;
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
class StudentsTable extends DataTableComponent
{
    use HasFilters;
    use HasColumns;
    use HasEvents;


    public function builder(): Builder
    {
        return Student::query();
    }


    public function mount()
    {

    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchStatus(false);
        $this->setToolBarDisabled();
//        $this->setCurrentlyReorderingStatus(false);
        $this->setLayout('components.layouts.app-full');
    }

    public function filters(): array
    {
        return [
            $this->getIdFilter(),
            $this->getFullNameFilter(),
            $this->getEmailFilter(),
            $this->getGroupFilter(),
        ];
    }

    public function columns(): array
    {
        return [
            $this->getIdColumn(),
            $this->getFullNameColumn(),
            $this->getEmailColumn(),
            $this->getGroupColumn(),
            $this->getDateOfBirthColumn(),
            $this->getActionColumn()
        ];
    }


    #[On(self::EVENT_REFRESH_STUDENTS_TABLE)]
    public function refreshTable(): void
    {
        $this->mount();
    }

    public function deleteStudent($id): void
    {
        $student = Student::find($id);
        $student?->delete();
        $this->refreshTable();
    }

    public function getActionHTML(Student $student): string
    {

        $click = "\$dispatch('showModal', {data: {'alias' : 'modals.student.edit-student-modal','params' :{'studentId': $student->id}}})";
        $editRoute = '';
        return <<<HTML

           <nobr>
            <button type="button"  wire:click="$click" class="btn btn-link action-icon" >
                <i class="mdi mdi-pencil"></i>
            </button>

                <a href="#" class="action-icon"
                        wire:click.prevent="deleteStudent($student->id)"
                        wire:confirm="Удалить ученика?"
                >
                    <i class="mdi mdi-delete"></i>
                </a>
            </nobr>

        HTML;
    }


}

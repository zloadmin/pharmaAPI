<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


trait HasEvents
{
    private const string EVENT_HIDE_MODAL = 'hideModal';
    private const string EVENT_REFRESH_STUDENTS_TABLE = 'refreshStudentsTable';
    private const string EVENT_REFRESH_TEACHERS_TABLE = 'refreshTeachersTable';
    private const string EVENT_REFRESH_GROUPS_TABLE = 'refreshGroupsTable';

    private function hideModal(): void
    {
        $this->dispatch(self::EVENT_HIDE_MODAL);
    }
    private function refreshStudentsTable(): void
    {
        $this->dispatch(self::EVENT_REFRESH_STUDENTS_TABLE);
    }
    private function refreshTeachersTable(): void
    {
        $this->dispatch(self::EVENT_REFRESH_TEACHERS_TABLE);
    }
    private function refreshGroupsTable(): void
    {
        $this->dispatch(self::EVENT_REFRESH_GROUPS_TABLE);
    }


}

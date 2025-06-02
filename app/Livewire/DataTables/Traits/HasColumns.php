<?php
declare(strict_types=1);


namespace App\Livewire\DataTables\Traits;


use App\Enums\User\UserRandomMode;
use App\Models\Teacher;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberRangeFilter;

/**
 * @method getFilterByKey(string $string)
 */
trait HasColumns
{


    public function getIdColumn()
    {
        return Column::make("ID", "id")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('id'));
    }

    public function getFullNameColumn()
    {
        return Column::make("ФИО", "full_name")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('full_name'));
    }

    public function getDateOfBirthColumn()
    {
        return Column::make("Дата рождения", "date_of_birth")
            ->sortable()
            ->format(
                fn($value, $row, Column $column) => $row->date_of_birth ? $row->date_of_birth->format('d.m.Y') : ''
            )
            ->secondaryHeader($this->getFilterByKey('date_of_birth'));
    }

    public function getNameColumn()
    {
        return Column::make('Название', "name")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('name'));
    }

    public function getEmailColumn()
    {
        return Column::make("Логин", "email")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('email'));
    }

    public function getPasswordUnsafeColumn()
    {
        return Column::make("Пароль", "password_unsafe")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('password_unsafe'));
    }

    public function getCompanyNameColumn()
    {
        return Column::make("Организация", "company_name")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('company_name'));
    }

    public function getJobTitleColumn()
    {
        return Column::make("Должность", "job_title")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('job_title'));
    }

    public function getNoteColumn()
    {
        return Column::make("Примечание", "note");
    }

    public function getTeacherColumn()
    {
        return Column::make("Преподаватель", "teacher.full_name")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('teacher_id'));
    }

    public function getGroupColumn()
    {
        return Column::make("Группа", "group.name")
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('group_id'));
    }


    public function getEducationModeColumn()
    {
        return Column::make("Доступные режимы", "education_mode")
            ->format(
                fn($value, $row, Column $column) => $row->education_mode ? $row->education_mode->label() : ''
            )
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('education_mode'));
    }

    public function getRandomModeColumn()
    {
        return Column::make("Случайность", "random_mode")
            ->format(
                fn($value, $row, Column $column) => $row->random_mode ? $row->random_mode->label() : ''
            )
            ->sortable()
            ->secondaryHeader($this->getFilterByKey('random_mode'));
    }

    public function getTicketsColumn()
    {
        return Column::make("Билеты")
            ->label(
                function ($row, Column $column) {
                    if ($row->random_mode === UserRandomMode::Yes) {
                        return 'Все';
                    }
                    if ($row->random_mode === UserRandomMode::No) {
                        return implode(',', $row->tickets->pluck('id')->toArray());
                    }
                    return '';

                }
            );
    }

    public function getActionColumn()
    {
        return Column::make('', 'id')
            ->format(
                fn($value, $row, Column $column) => $this->getActionHTML($row)
            )
            ->html();
    }


    public function getStudentsColumn()
    {

        return Column::make("Студенты")
            ->label(
                fn($row, Column $column) => $this->getStudentsHTML($row)
            )->html();
    }


}

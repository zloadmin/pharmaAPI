<?php
declare(strict_types=1);


namespace App\Livewire\DataTables\Traits;


use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRandomMode;
use App\Enums\User\UserRole;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

trait HasFilters
{

    public function getIdFilter()
    {
        return TextFilter::make('ID', 'id')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.id', '=', $value);
            })
            ->hiddenFromAll();
    }

    public function getEmailFilter()
    {
        return TextFilter::make('Логин', 'email')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.email', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }

    public function getPasswordUnsafeFilter()
    {
        return TextFilter::make('Пароль', 'password_unsafe')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.password_unsafe', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }

    public function getFullNameFilter()
    {
        return TextFilter::make('ФИО', 'full_name')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.full_name', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }
    public function getNameFilter()
    {
        return TextFilter::make('Название', 'name')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('name', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }


    public function getCompanyNameFilter()
    {
        return TextFilter::make('Организация', 'company_name')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.company_name', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }

    public function getJobTitleFilter()
    {
        return TextFilter::make('Должность', 'job_title')
            ->filter(function (Builder $builder, string $value) {
                $builder->where('users.job_title', 'LIKE', '%' . $value . '%');
            })
            ->hiddenFromAll();
    }

    public function getEducationModeFilter()
    {

        return SelectFilter::make('Доступные режимы', 'education_mode')
            ->options(UserEducationMode::getSelectFilterOptions())
            ->filter(function (Builder $builder, string $value) {
                if ($value) {
                    $builder->where('users.education_mode', $value);
                }
            })->hiddenFromAll();
    }
    public function getTeacherFilter()
    {

        return SelectFilter::make('Преподаватель', 'teacher_id')
            ->options([0 => 'Все'] + Teacher::pluck('full_name', 'id')->toArray())
            ->filter(function (Builder $builder, string $value) {
                if ($value) {
                    $builder->where('users.teacher_id', $value);
                }
            })->hiddenFromAll();
    }
    public function getGroupFilter()
    {

        return SelectFilter::make('Группа', 'group_id')
            ->options([0 => 'Все'] + Group::pluck('name', 'id')->toArray())
            ->filter(function (Builder $builder, string $value) {
                if ($value) {
                    $builder->where('users.group_id', $value);
                }
            })->hiddenFromAll();
    }
    public function getRandomModeFilter()
    {

        return SelectFilter::make('Случайность', 'random_mode')
            ->options(UserRandomMode::getSelectFilterOptions())
            ->filter(function (Builder $builder, string $value) {
                if ($value) {
                    $builder->where('users.random_mode', $value);
                }
            })->hiddenFromAll();
    }
}

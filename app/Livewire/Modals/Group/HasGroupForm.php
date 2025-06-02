<?php
declare(strict_types=1);


namespace App\Livewire\Modals\Group;

use App\Enums\User\UserEducationMode;
use App\Enums\User\UserRandomMode;
use App\Enums\User\UserRole;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;
use Livewire\Attributes\Validate;


trait HasGroupForm
{

    public string $name = '';


    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:200'
            ],
        ];
    }

    public function loadModel(Group $group): void
    {
        $this->name = $group->name;
    }
}

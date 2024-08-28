<?php

namespace App\Models;

use App\Enums\User\UserRole;
use App\Models\Scopes\User\StudentRoleScope;
use App\Models\Scopes\User\TeacherRoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([TeacherRoleScope::class])]
class Teacher extends User
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'role' => UserRole::teacher
    ];
}

<?php

namespace App\Models;

use App\Enums\User\UserRole;
use App\Models\Scopes\User\AdminRoleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy([AdminRoleScope::class])]
class Admin extends User
{

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'role' => UserRole::Admin
    ];
}

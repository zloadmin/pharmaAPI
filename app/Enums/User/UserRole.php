<?php

namespace App\Enums\User;

use App\Enums\Traits\Arrayable;

enum UserRole: string
{
    use Arrayable;
    case admin = 'admin';
    case teacher = 'teacher';
    case student = 'student';
}

<?php

namespace App\Enums\User;

use App\Enums\Traits\Arrayable;

enum UserRole: string
{
    use Arrayable;
    case Admin = 'admin';
    case Teacher = 'teacher';
    case Student = 'student';
}

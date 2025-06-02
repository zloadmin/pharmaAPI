<?php

namespace App\Enums\User;

use App\Enums\Traits\Arrayable;

enum UserRole: string
{
    use Arrayable;
    case Admin = 'admin';
    case Teacher = 'teacher';
    case Student = 'student';
    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Администратор',
            self::Teacher => 'Преподаватель',
            self::Student => 'Студент',
        };
    }
}

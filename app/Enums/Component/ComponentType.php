<?php

namespace App\Enums\Component;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;

enum ComponentType: string
{
    use Arrayable;
    use Randomable;

    case Stuff = 'Stuff';
    case Loose = 'Loose';
    case Liquid = 'Liquid';

    public function label(): string
    {
        return match ($this) {
            self::Stuff => 'Посуда',
            self::Loose => 'Сыпучий',
            self::Liquid => 'Жидкий',
        };
    }
    public function badge(): string
    {
        return match ($this) {
            self::Stuff => 'success',
            self::Loose => 'warning',
            self::Liquid => 'primary',
        };
    }

}

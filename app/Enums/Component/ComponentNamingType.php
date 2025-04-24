<?php

namespace App\Enums\Component;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;

enum ComponentNamingType: string
{
    use Arrayable;
    use Randomable;

    case AdditionalGlassware = 'AdditionalGlassware';
    case SimpleGlassware = 'SimpleGlassware';
    case LS = 'LS';
    case Reagents = 'Reagents';
    case Solvents = 'Solvents';

    public function label(): string
    {
        return match ($this) {
            self::AdditionalGlassware => 'Вспомогательная посуда',
            self::SimpleGlassware => 'Посуда',
            self::LS => 'ЛС',
            self::Reagents => 'Реактивы',
            self::Solvents => 'Растворители',
        };
    }
}

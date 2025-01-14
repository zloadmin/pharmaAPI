<?php

namespace App\Enums\Stages;

use App\Enums\Traits\Arrayable;

enum Stage: string
{
    use Arrayable;

    case index = 'index';
    case storage = 'storage';
    case weighting = 'weighting';
    case cooking = 'cooking';
    case chromatograph = 'chromatograph';


    public function label(): string
    {
        return match ($this) {
            self::index => 'Лаборатория',
            self::storage => 'Склад',
            self::weighting => 'Весовая',
            self::cooking => 'Приготовление растворов',
            self::chromatograph => 'Хроматограф',
        };
    }

    public function sessionModelField() : string
    {
        return sprintf('is_lock_%s', $this->value);
    }

}

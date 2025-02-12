<?php

namespace App\Enums\Chromatograph;

use App\Enums\Traits\Arrayable;

enum ChromatographStatusColumns: string
{
    use HasChromatographStatus;
    use Arrayable;

    case Disabled = 'Disabled';
    case NoReplaced = 'NoReplaced';
    case Replaced = 'Replaced';



    static function getDefaultStatus(): self
    {
        return self::Disabled;
    }

    public function isDisabled(): bool
    {
        return $this == self::Disabled;
    }

    public function isOn(): bool
    {
        return $this === self::Replaced;
    }

    public function getIconHref(): string
    {
        return '/web/images/sprite.svg#ic_chromatograph3';
    }

    public function getTitle(): string
    {
        return 'Заменить колонки';
    }

    public function getDescription(): string
    {
        return 'Замена колонки в хроматографе';
    }
    public function isReplaced(): bool
    {
        return $this == self::Replaced;
    }
}

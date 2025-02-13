<?php

namespace App\Enums\Chromatograph;

use App\Enums\Traits\Arrayable;

enum ChromatographStatusEntries: string
{
    use HasChromatographStatus;
    use Arrayable;

    case Disabled = 'Disabled';
    case Enable = 'Enable';

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
        return $this === self::Enable;
    }

    public function getIconHref(): string
    {
        return '/web/images/sprite.svg#ic_chromatograph7';
    }

    public function getTitle(): string
    {
        return 'Внести записи';
    }

}

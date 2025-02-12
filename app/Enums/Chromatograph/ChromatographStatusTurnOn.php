<?php

namespace App\Enums\Chromatograph;

use App\Enums\Traits\Arrayable;

enum ChromatographStatusTurnOn: string
{
    use HasChromatographStatus;
    use Arrayable;

    case Disabled = 'Disabled';
    case Off = 'Off';
    case On = 'On';


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
        return $this === self::On;
    }

    public function getIconHref(): string
    {
        return '/web/images/sprite.svg#ic_chromatograph1';
    }

    public function getTitle(): string
    {
        return 'Включить';
    }

    public function getDescription(): string
    {
        return 'Включает весь хроматограф';
    }
}

<?php

namespace App\Enums\Chromatograph;

use App\Enums\Traits\Arrayable;

enum ChromatographStatusPump: string
{
    use HasChromatographStatus;
    use Arrayable;

    case Disabled = 'Disabled';
    case ReadyOn = 'ReadyOn';
    case On = 'On';
    case ReadyOff = 'ReadyOff';
    case Off = 'Off';


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
        return $this === self::On || $this == self::ReadyOff;
    }

    public function getIconHref(): string
    {
        return '/web/images/sprite.svg#ic_chromatograph4';
    }

    public function getTitle(): string
    {
        return $this == self::ReadyOn || $this == self::Off ? 'Включить' : 'Выключить';
    }

    public function getDescription(): string
    {
        return 'Управление насосом хроматографа';
    }

    public function onClick(): string
    {
        if ($this === self::ReadyOn) {
            return 'turnOnPump';
        }
        if ($this === self::ReadyOff) {
            return 'turnOffPump';
        }
        return '';
    }
}

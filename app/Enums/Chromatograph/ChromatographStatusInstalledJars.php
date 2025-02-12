<?php

namespace App\Enums\Chromatograph;

use App\Enums\Traits\Arrayable;

enum ChromatographStatusInstalledJars: string
{
    use HasChromatographStatus;
    use Arrayable;

    case Enabled = 'Enabled';
    case InstalledOne = 'InstalledOne';
    case InstalledTwo = 'InstalledTwo';


    static function getDefaultStatus(): self
    {
        return self::Enabled;
    }

    public function isDisabled(): bool
    {
        return false;
    }

    public function isOn(): bool
    {
        return $this !== self::Enabled;
    }

    public function getIconHref(): string
    {
        return '/web/images/sprite.svg#ic_chromatograph1';
    }

    public function getTitle(): string
    {
        return 'Установить';
    }

    public function getDescription(): string
    {
        return 'Поставить банки на хроматограф';
    }
}

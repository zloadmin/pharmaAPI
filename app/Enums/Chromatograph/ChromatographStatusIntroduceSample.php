<?php

namespace App\Enums\Chromatograph;

use App\Enums\Traits\Arrayable;

enum ChromatographStatusIntroduceSample: string
{
    use HasChromatographStatus;
    use Arrayable;

    case Disabled = 'Disabled';
    case Introduce = 'Introduce';
    case Done = 'Done';


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
        return $this === self::Done;
    }

    public function getIconHref(): string
    {
        return '/web/images/sprite.svg#ic_chromatograph5';
    }

    public function getTitle(): string
    {
        return 'Ввести пробу';
    }

    public function getDescription(): string
    {
        return 'Ввод шприцов в кран хроматографа';
    }
    public function onClick() : string
    {
        return $this == self::Introduce ? '$dispatch("show-modal-chromatograph-examples")'  : '';
    }
}

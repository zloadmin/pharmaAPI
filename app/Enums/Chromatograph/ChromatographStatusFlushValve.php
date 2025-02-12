<?php

namespace App\Enums\Chromatograph;

use App\Enums\Traits\Arrayable;

enum ChromatographStatusFlushValve: string
{
    use HasChromatographStatus;
    use Arrayable;

    case Disabled = 'Disabled';
    case ReadyForOpen = 'ReadyForOpen';
    case Open = 'Open';
    case ReadyForClose = 'ReadyForClose';
    case Close = 'Close';


    public function isOpen(): bool
    {
        return $this === self::Open;
    }

    static function getDefaultStatus(): self
    {
        return self::Disabled;
    }

    public function isDisabled(): bool
    {
        return $this === self::Disabled;
        return $this === self::Disabled || $this === self::Open;
    }

    public function isOn(): bool
    {
        return $this === self::Open || $this === self::ReadyForClose;
    }

    public function getIconHref(): string
    {
        return '/web/images/sprite.svg#ic_chromatograph2';
    }

    public function getTitle(): string
    {
//        switch ($this) {
//            case self::Disabled:
//            case self::ReadyForOpen:
//                return 'Открыть';
//            case self::Open:
//                return 'Открыт';
//            case self::ReadyForClose:
//                return 'Закрыть';
//            case self::Close:
//                return 'Закрыт';
//        }
        return $this === self::Disabled || $this === self::ReadyForOpen ? 'Открыть' : 'Закрыть';
    }

    public function getDescription(): string
    {
        return 'Вентель промыки каппиляров';
    }

    public function onClick(): string
    {
        if ($this === self::ReadyForOpen) {
            return 'openChromatographFlushValve';
        }
        if ($this === self::ReadyForClose) {
            return 'closeChromatographFlushValve';
        }
        return '';
    }

    public function isReadyForOpen(): bool
    {
        return $this === self::ReadyForOpen;
    }
}

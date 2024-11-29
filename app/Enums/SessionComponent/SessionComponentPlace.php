<?php

namespace App\Enums\SessionComponent;

use App\Enums\Traits\Arrayable;

enum SessionComponentPlace: string
{
    use Arrayable;

    case inCart = 'inCart';
    case onTable = 'onTable';
    case inSink = 'inSink';
    case onScalesLeftBox = 'onScalesLeftBox';
    case onScalesRightBox = 'onScalesRightBox';
    case onScalesBottomBox = 'onScalesBottomBox';


    public function label(): string
    {
        return match ($this) {
            self::inCart => 'inCart',
            self::onTable => 'onTable',
            self::inSink => 'inSink',
            self::onScalesLeftBox => 'Левый блок (посуда)',
            self::onScalesRightBox => 'Правый блок (вещества)',
            self::onScalesBottomBox => 'Нижний блок (инструменты)',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::inCart => 'inCart',
            self::onTable => 'onTable',
            self::inSink => 'inSink',
            self::onScalesLeftBox => 'success',
            self::onScalesRightBox => 'warning',
            self::onScalesBottomBox => 'primary',
        };
    }

    static function getOnScalesValues(): array
    {
        $values = [];
        foreach (self::getOnScales() as $case) {
            $values[] = $case->value;
        }
        return $values;
    }

    static function getOnScales(): array
    {
        return [
            self::onScalesLeftBox,
            self::onScalesRightBox,
            self::onScalesBottomBox
        ];
    }

    public function isScalesLeftOrRight(): bool
    {
        return $this === self::onScalesLeftBox || $this === self::onScalesRightBox;
    }

    public function isScalesBottom(): bool
    {
        return $this === self::onScalesBottomBox;
    }
}

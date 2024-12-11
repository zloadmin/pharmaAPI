<?php

namespace App\Enums\SessionComponent;

use App\Enums\Traits\Arrayable;

enum SessionComponentPlace: string
{
    use Arrayable;

    case inCart = 'inCart';
    case onWeightingTable = 'onWeightingTable';
    case inSink = 'inSink';
    case onScalesLeftBox = 'onScalesLeftBox';
    case onScalesRightBox = 'onScalesRightBox';
    case onScalesBottomBox = 'onScalesBottomBox';
    case onCookingTable = 'onCookingTable';
    case onPHMeter = 'onPHMeter';
    case inMixer = 'inMixer';
    case inBathLeftBox = 'inBathLeftBox';
    case inBathRightBox = 'inBathRightBox';
    case onFiltrationBeforeLeftBox = 'onFiltrationBeforeLeftBox';
    case onFiltrationBeforeRightBox = 'onFiltrationBeforeRightBox';
    case onFiltrationAfterLeftBox = 'onFiltrationAfterLeftBox';
    case onFiltrationAfterRightBox = 'onFiltrationAfterRightBox';


    public function label(): string
    {
        return match ($this) {
            self::inCart => 'inCart',
            self::onWeightingTable => 'onWeightingTable',
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
            self::onWeightingTable => 'onWeightingTable',
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

    public function generalName(): string
    {
        return match ($this) {
            self::onPHMeter => 'ph-meter',
            self::inCart => throw new \Exception('To be implemented'),
            self::onWeightingTable => throw new \Exception('To be implemented'),
            self::inSink => throw new \Exception('To be implemented'),
            self::onScalesLeftBox => throw new \Exception('To be implemented'),
            self::onScalesRightBox => throw new \Exception('To be implemented'),
            self::onScalesBottomBox => throw new \Exception('To be implemented'),
            self::onCookingTable => throw new \Exception('To be implemented'),
            self::inMixer => 'mixer',
            self::inBathLeftBox => throw new \Exception('To be implemented'),
            self::inBathRightBox => throw new \Exception('To be implemented'),
            self::onFiltrationBeforeLeftBox => throw new \Exception('To be implemented'),
            self::onFiltrationBeforeRightBox => throw new \Exception('To be implemented'),
            self::onFiltrationAfterLeftBox => throw new \Exception('To be implemented'),
            self::onFiltrationAfterRightBox => throw new \Exception('To be implemented')
        };
    }
}

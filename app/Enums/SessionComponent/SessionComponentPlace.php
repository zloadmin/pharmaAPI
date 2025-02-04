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
    case inFiltrationBox = 'inFiltrationBox';

    case inMixBoxOne = 'inMixBoxOne';
    case inMixBoxTwo = 'inMixBoxTwo';
    case inMixBoxThree = 'inMixBoxThree';
    case inMixBoxFour = 'inMixBoxFour';


    public function label(): string
    {
        return match ($this) {
            self::inCart => 'inCart',
            self::onWeightingTable => 'onWeightingTable',
            self::inSink => 'Мойка',
            self::onScalesLeftBox => 'Левый блок (посуда)',
            self::onScalesRightBox => 'Правый блок (вещества)',
            self::onScalesBottomBox => 'Нижний блок (инструменты)',
            self::inMixBoxOne => 'Миксер ячейка 1',
            self::inMixBoxTwo => 'Миксер ячейка 2',
            self::inMixBoxThree => 'Миксер ячейка 3',
            self::inMixBoxFour => 'Миксер ячейка 4',

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

    static function getMixStuffPlaceValues(): array
    {
        $values = [];
        foreach (self::getMixStuffPlaces() as $case) {
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

    static function getMixStuffPlaces(): array
    {
        return [
            self::inMixBoxOne,
            self::inMixBoxTwo,
            self::inMixBoxThree,
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
            self::inBathLeftBox => 'in-bath-left',
            self::inBathRightBox => 'in-bath-right',
            self::inFiltrationBox => 'in-filtration',
            self::inMixBoxOne => 'mix-one',
            self::inMixBoxTwo => 'mix-two',
            self::inMixBoxThree => 'mix-three',
            self::inMixBoxFour => 'mix-four',
        };
    }
}

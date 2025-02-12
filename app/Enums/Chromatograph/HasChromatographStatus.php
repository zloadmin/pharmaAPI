<?php
declare(strict_types=1);


namespace App\Enums\Chromatograph;


trait HasChromatographStatus
{
    abstract static function getDefaultStatus(): self;

    static function getDefaultStatusValue(): string
    {
        return self::getDefaultStatus()->value;
    }
    abstract public function isDisabled() : bool;
    abstract public function isOn() : bool;
    abstract public function getIconHref() : string;
    abstract public function getTitle() : string;
//    abstract public function getDescription() : string;

}
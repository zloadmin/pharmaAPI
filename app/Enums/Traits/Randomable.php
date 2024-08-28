<?php

declare(strict_types=1);

namespace App\Enums\Traits;

trait Randomable
{
    use Arrayable;

    static function random()
    {
        return self::values()[rand(0, count(self::values()) - 1)];
    }

    static function randomCase(): static
    {
        return self::cases()[rand(0, count(self::cases()) - 1)];
    }
}

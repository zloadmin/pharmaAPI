<?php
declare(strict_types=1);


namespace App\Enums\Traits;


/**
 * @method static cases()
 */
trait Castable
{
    public static function castByName(string $name): self
    {
        foreach (self::cases() as $item) {
            if ($name === $item->name) {
                return $item;
            }
        }
        throw new \ValueError("$name is not a valid name for enum " . self::class);
    }
}
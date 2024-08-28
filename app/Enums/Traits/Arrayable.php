<?php
declare(strict_types=1);


namespace App\Enums\Traits;


/**
 * @method static cases()
 */
trait Arrayable
{
    static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
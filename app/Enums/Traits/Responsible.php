<?php
declare(strict_types=1);


namespace App\Enum\Traits;


/**
 * @method static cases()
 */
trait Responsible
{
    static function response(): array
    {
        $result = [];
        foreach (self::cases() as $key => $item) {
            // $result[$key]['name'] = $item->name; TODO: do we need it???
            $result[$key]['value'] = $item->value;
            if (method_exists($item, 'label')) {
                $result[$key]['label'] = $item->label();
            }
        }
        return $result;
    }
}
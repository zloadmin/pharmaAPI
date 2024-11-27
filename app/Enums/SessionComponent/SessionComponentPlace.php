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

    public function isScalesLeftOrRight(): bool
    {
        return $this === self::onScalesLeftBox || $this === self::onScalesRightBox;
    }
    public function isScalesBottom(): bool
    {
        return $this === self::onScalesBottomBox;
    }
}

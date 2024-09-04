<?php

namespace App\Enums\Ticket;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;

enum TicketLevel: string
{
    use Arrayable, Randomable;

    case Base = 'base';
    case Prof = 'prof';
}

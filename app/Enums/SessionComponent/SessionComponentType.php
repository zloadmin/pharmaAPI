<?php

namespace App\Enums\SessionComponent;

use App\Enums\Traits\Arrayable;

enum SessionComponentType : string
{
    use Arrayable;

    case Simple = 'simple';
    case Weighed = 'weighed';
    case Mixed = 'mixed';
    case MobilePhase = 'mobilePhase';
    case FilteredExample = 'filteredExample';
    case FilteredMobilePhase = 'filteredMobilePhase';
    case SpecialStaff = 'specialStaff';

}

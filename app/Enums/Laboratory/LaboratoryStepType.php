<?php

namespace App\Enums\Laboratory;

use App\Enums\Traits\Arrayable;

enum LaboratoryStepType: string
{
    use Arrayable;

    case watchVideo = 'watchVideo';
    case readPharmacologicalArticle = 'readPharmacologicalArticle';
}

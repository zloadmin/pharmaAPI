<?php

namespace App\Enums\Student;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;

enum EducationMode: string
{
    use Arrayable, Randomable;
    case Learning = 'learning';
    case Exam = 'exam';
}

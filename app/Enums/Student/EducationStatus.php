<?php

namespace App\Enums\Student;

use App\Enums\Traits\Arrayable;
use App\Enums\Traits\Randomable;

enum EducationStatus: string
{
    use Arrayable, Randomable;

    case Waiting = 'Waiting'; //В ожидание
    case InWork = 'InWork'; //В обучение
    case Exam = 'Exam'; //Экзамен
    case ExamDone = 'ExamDone'; //Экзамен пройден
    case Done = 'Done'; //Обучение завершено
}

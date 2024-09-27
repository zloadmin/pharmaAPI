<?php

namespace App\Http\Controllers\Teacher\Student;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Student\ImportStudentRequest;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentEducationStatusMultiplyRequest;
use App\Http\Requests\Student\UpdateStudentEducationStatusRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\Student\StudentResource;
use App\Imports\Student\StudentImport;
use App\Mail\Student\StudentAccessEmail;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Base\Student\BaseStudentController;

/**
 * @group [Преподаватель] Ученики
 */
class StudentController extends BaseStudentController
{

}

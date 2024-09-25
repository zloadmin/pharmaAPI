<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\Student\StudentResource;
use App\Mail\Student\StudentAccessEmail;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


/**
 * @group [Admin] Ученики
 */
class StudentController extends ApiController
{
    /**
     * Список
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResourceCollection App\Http\Resources\Student\StudentResource
     * @apiResourceModel App\Models\Student with=teacher,group paginate=15
     * @queryParam page int The page number.
     */
    public function list()
    {
        $students = Student::query()->with(['teacher', 'group']);
        return StudentResource::collection($students->paginate());
    }

    /**
     * Показать
     *
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\Student\StudentResource
     * @apiResourceModel App\Models\Student with=teacher,group
     * @param Student $student
     * @return StudentResource
     */
    public function show(Student $student)
    {
        $student->load(['teacher', 'group']);
        return new StudentResource($student);
    }

    /**
     * Создать
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The full name field is required. (and 3 more errors)","errors":{"full_name":["The full name field is required."],"email":["The email has already been taken."],"password":["The password field is required."],"password_confirmation":["The password confirmation field is required."]}}
     * @apiResource App\Http\Resources\Student\StudentResource
     * @apiResourceModel App\Models\Student with=teacher,group
     * @param StoreStudentRequest $request
     * @return StudentResource
     */
    public function store(StoreStudentRequest $request)
    {
        $password = Str::random();
        $student = Student::createFromStoreStudentRequest($request, $password);
        Mail::queue(new StudentAccessEmail($student, $password));
        $student->load(['teacher', 'group']);
        return new StudentResource($student);
    }

    /**
     * Изменить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors"
     * @apiResource App\Http\Resources\Student\StudentResource
     * @apiResourceModel App\Models\Student with=teacher,group
     * @param Student $student
     * @param UpdateStudentRequest $request
     * @return StudentResource
     */
    public function update(Student $student, UpdateStudentRequest $request)
    {
        $student->updateFromUpdateStudentRequest($request);
        $student->load(['teacher', 'group']);
        return new StudentResource($student);
    }

    /**
     * Удалить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=204 scenario="Deleted"
     */
    public function delete(Student $student)
    {
        $student->delete();
        return $this->respondDeleted();
    }
}

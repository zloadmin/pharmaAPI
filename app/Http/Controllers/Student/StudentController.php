<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\ApiController;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateStudentRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\Student;


/**
 * @group Студенты
 */
class StudentController extends ApiController
{
    /**
     * Список
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResourceCollection App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\Student paginate=15
     * @queryParam page int The page number.
     */
    public function list()
    {
        $students = Student::query();
        return UserResource::collection($students->paginate());
    }

    /**
     * Показать
     *
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\Student
     * @param Student $student
     * @return UserResource
     */
    public function show(Student $student)
    {
        return new UserResource($student);
    }

    /**
     * Создать
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The full name field is required. (and 3 more errors)","errors":{"full_name":["The full name field is required."],"email":["The email has already been taken."],"password":["The password field is required."],"password_confirmation":["The password confirmation field is required."]}}
     * @apiResource App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\Student
     * @param StoreUserRequest $request
     * @return UserResource
     */
    public function store(StoreUserRequest $request)
    {
        $student = Student::createFromStoreUserRequest($request);
        return new UserResource($student);
    }

    /**
     * Изменить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors"
     * @apiResource App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\Student
     * @param Student $student
     * @param UpdateStudentRequest $request
     * @return UserResource
     */
    public function update(Student $student, UpdateStudentRequest $request)
    {
        $student->updateFromUpdateUserRequest($request);
        return new UserResource($student);
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

<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateTeacherRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

/**
 * @group Преподаватели
 */
class TeacherController extends ApiController
{
    /**
     * Список
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResourceCollection App\Http\Resources\Teacher\TeacherResource
     * @apiResourceModel App\Models\Teacher paginate=15
     * @queryParam page int The page number.
     */
    public function list()
    {
        $teachers = Teacher::query();
        return UserResource::collection($teachers->paginate());
    }

    /**
     * Показать
     *
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\Teacher\TeacherResource
     * @apiResourceModel App\Models\Teacher
     * @param Teacher $teacher
     * @return UserResource
     */
    public function show(Teacher $teacher)
    {
        return new UserResource($teacher);
    }

    /**
     * Создать
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The full name field is required. (and 3 more errors)","errors":{"full_name":["The full name field is required."],"email":["The email has already been taken."],"password":["The password field is required."],"password_confirmation":["The password confirmation field is required."]}}
     * @apiResource App\Http\Resources\Teacher\TeacherResource
     * @apiResourceModel App\Models\Teacher
     * @param StoreUserRequest $request
     * @return UserResource
     */
    public function store(StoreUserRequest $request)
    {
        $teacher = Teacher::createFromStoreUserRequest($request);
        return new UserResource($teacher);
    }

    /**
     * Изменить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors"
     * @apiResource App\Http\Resources\Teacher\TeacherResource
     * @apiResourceModel App\Models\Teacher
     * @param Teacher $teacher
     * @param UpdateTeacherRequest $request
     * @return UserResource
     */
    public function update(Teacher $teacher, UpdateTeacherRequest $request)
    {
        $teacher->updateFromUpdateUserRequest($request);
        return new UserResource($teacher);
    }

    /**
     * Удалить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=204 scenario="Deleted"
     */
    public function delete(Teacher $teacher)
    {
        $teacher->delete();
        return $this->respondDeleted();
    }
}

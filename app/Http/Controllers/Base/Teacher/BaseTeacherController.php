<?php

namespace App\Http\Controllers\Base\Teacher;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Http\Resources\Teacher\TeacherResource;
use App\Http\Resources\User\UserResource;
use App\Models\Group;
use App\Models\Teacher;

/**
 * @group [Админ] Преподаватели
 */
class BaseTeacherController extends ApiController
{
    /**
     * Список
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResourceCollection App\Http\Resources\Teacher\TeacherResource
     * @apiResourceModel App\Models\Teacher with=department paginate=15
     * @queryParam page int The page number.
     */
    public function list()
    {
        $teachers = Teacher::query()->with('department');//->with('group');
        return TeacherResource::collection($teachers->paginate());
    }

    /**
     * Показать
     *
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\Teacher\TeacherResource
     * @apiResourceModel App\Models\Teacher with=department
     * @param Teacher $teacher
     * @return TeacherResource
     */
    public function show(Teacher $teacher)
    {
//        $teacher->load('group');
        $teacher->load('department');
        return new TeacherResource($teacher);
    }

    /**
     * Создать
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The full name field is required. (and 3 more errors)","errors":{"full_name":["The full name field is required."],"email":["The email has already been taken."],"password":["The password field is required."],"password_confirmation":["The password confirmation field is required."]}}
     * @apiResource App\Http\Resources\Teacher\TeacherResource
     * @apiResourceModel App\Models\Teacher with=department
     * @param StoreTeacherRequest $request
     * @return TeacherResource
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = Teacher::createFromStoreTeacherRequest($request);
        $teacher->load('department');
//        $group = Group::findOrFail($request->group_id);
//        $group->setTeacher($teacher);
//        $teacher->load('group');

        return new TeacherResource($teacher);
    }


    /**
     * Изменить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors"
     * @apiResource App\Http\Resources\Teacher\TeacherResource
     * @apiResourceModel App\Models\Teacher with=department
     * @param StoreTeacherRequest $request
     * @param Teacher $teacher
     * @return TeacherResource
     */
    public function update(StoreTeacherRequest $request, Teacher $teacher)
    {
        $teacher->updateFromStoreTeacherRequest($request);
        $teacher->load('department');
//        $group = Group::findOrFail($request->group_id);
//        $group->setTeacher($teacher);
//        $teacher->refresh();
//        $teacher->load('group');

        return new TeacherResource($teacher);
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
//        if ($teacher->group) {
//            $teacher->group->unsetTeacher();
//        }
        $teacher->delete();
        return $this->respondDeleted();
    }
}

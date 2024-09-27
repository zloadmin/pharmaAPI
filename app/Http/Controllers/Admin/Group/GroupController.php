<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Group\ReassignStudentRequest;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Resources\Group\GroupResource;
use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\Student;
use App\Models\Teacher;

/**
 * @group [Админ] Группы
 */
class GroupController extends ApiController
{

    /**
     * Список
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResourceCollection App\Http\Resources\Group\GroupResource
     * @apiResourceModel App\Models\Group with=teacher paginate=15
     * @queryParam page int The page number.
     */
    public function list()
    {
        $groups = Group::query()->with(['teacher']);
        return GroupResource::collection($groups->paginate());
    }

    /**
     * Показать
     *
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\Group\GroupResource
     * @apiResourceModel App\Models\Group with=teacher,students
     * @param Group $group
     * @return GroupResource
     */
    public function show(Group $group)
    {
        $group->load(['teacher', 'students']);
        return new GroupResource($group);
    }

    /**
     * Создать
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The name field is required. (and 2 more errors)","errors":{"name":["The name field is required."],"description":["The description field is required."],"teacher_id":["The teacher id field is required."]}}
     * @apiResource App\Http\Resources\Group\GroupResource
     * @apiResourceModel App\Models\Group with=teacher,students
     * @param StoreGroupRequest $request
     * @return GroupResource
     */
    public function store(StoreGroupRequest $request)
    {
        $group = Group::createFromStoreUserRequest($request);
        $group->load(['teacher', 'students']);
        return new GroupResource($group);
    }

    /**
     * Изменить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The name field is required. (and 2 more errors)","errors":{"name":["The name field is required."],"description":["The description field is required."],"teacher_id":["The teacher id field is required."]}}
     * @apiResource App\Http\Resources\Group\GroupResource
     * @apiResourceModel App\Models\Group with=teacher,students
     * @param Group $group
     * @param StoreGroupRequest $request
     * @return GroupResource
     */
    public function update(Group $group, StoreGroupRequest $request)
    {
        $group->updateFromUpdateUserRequest($request);
        $group->load(['teacher', 'students']);
        return new GroupResource($group);
    }

    /**
     * Удалить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=204 scenario="Deleted"
     */
    public function delete(Group $group)
    {
        $group->students()->detach();
        $group->delete();
        return $this->respondDeleted();
    }

    /**
     * Переназначить ученика
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\Group\GroupResource
     * @apiResourceModel App\Models\Group with=teacher,students
     * @param Group $group
     * @param Student $student
     * @return GroupResource
     */
    public function reassignStudent(Group $group, Student $student)
    {
        // Move from old groups TODO: student can be inside a lot of groups?
        GroupStudent::where('student_id', $student->id)->delete();

        // Add to new group
        GroupStudent::create(['student_id' => $student->id, 'group_id' => $group->id]);

        // Ученики: Если ученик перемещается в другую группу, автоматически меняется назначенный преподаватель.
        $student->update([
            'teacher_id' => $group->teacher_id
        ]);

        $group->load(['teacher', 'students']);
        return new GroupResource($group);
    }

    /**
     * Переназначить преподавателя
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\Group\GroupResource
     * @apiResourceModel App\Models\Group with=teacher,students
     * @param Group $group
     * @param Teacher $teacher
     * @return GroupResource
     */
    public function reassignTeacher(Group $group, Teacher $teacher)
    {
        // Move from old group
        if ($teacher->group) {
            $teacher->group->update(['teacher_id' => null]);
        }

        $group->update(['teacher_id' => $teacher->id]);
        $group->load(['teacher', 'students']);
        return new GroupResource($group);
    }
}

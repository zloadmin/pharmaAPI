<?php

namespace App\Http\Controllers\Base\Department;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Department\StoreDepartmentRequest;
use App\Http\Requests\Group\StoreGroupRequest;
use App\Http\Resources\Department\DepartmentResource;
use App\Models\Department;
use App\Models\Teacher;

class BaseDepartmentController extends ApiController
{

    /**
     * Список
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResourceCollection App\Http\Resources\Department\DepartmentResource
     * @apiResourceModel App\Models\Department
     * @queryParam page int The page number.
     */
    public function list()
    {
        $departments = Department::query();
        return DepartmentResource::collection($departments->paginate());
    }

    /**
     * Показать
     *
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @apiResource App\Http\Resources\Department\DepartmentResource
     * @apiResourceModel App\Models\Department
     * @param Department $department
     * @return DepartmentResource
     */
    public function show(Department $department)
    {
        return new DepartmentResource($department);
    }

    /**
     * Создать
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The name field is required. (and 2 more errors)","errors":{"name":["The name field is required."],"description":["The description field is required."],"teacher_id":["The teacher id field is required."]}}
     * @apiResource App\Http\Resources\Department\DepartmentResource
     * @apiResourceModel App\Models\Department
     * @param StoreGroupRequest $request
     * @return DepartmentResource
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::createFromStoreDepartmentRequest($request);
        return new DepartmentResource($department);
    }

    /**
     * Изменить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"The name field is required. (and 2 more errors)","errors":{"name":["The name field is required."],"description":["The description field is required."],"teacher_id":["The teacher id field is required."]}}
     * @apiResource App\Http\Resources\Department\DepartmentResource
     * @apiResourceModel App\Models\Department
     * @param Department $department
     * @param StoreDepartmentRequest $request
     * @return DepartmentResource
     */
    public function update(Department $department, StoreDepartmentRequest $request)
    {
        $department->updateFromStoreDepartmentRequest($request);
        return new DepartmentResource($department);
    }

    /**
     * Удалить
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=204 scenario="Deleted"
     */
    public function delete(Department $department)
    {
        $department->teachers()->update(['department_id' => null]);
        $department->delete();
        return $this->respondDeleted();
    }

}

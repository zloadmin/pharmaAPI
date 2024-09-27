<?php

namespace App\Http\Controllers\Base\Student;

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


/**
 * @group [Админ] Ученики
 */
class BaseStudentController extends ApiController
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
     * Импортировать
     *
     * Пример файла <a href="/StudentImportExample.xlsx">StudentImportExample</a> с комментариями
     *
     * | ФИО                     | Дата рождения | Email                                         |                                         |
     * | ----------------------- | ------------- | --------------------------------------------- | --------------------------------------- |
     * | Иванов Ивани Иванович   | 19.02.1989    | [test123@test.com](mailto:test123@test.com)   | Удачно                                  |
     * | Иванов Ивани Иванович   | 19.02.1989    | [test123@test.com](mailto:test123@test.com)   | Ошибка - повторный email                |
     * |                         | 19.02.1989    | [test1234@test.com](mailto:test1234@test.com) | Ошибка - нет ФИО                        |
     * | Иванов Ивани Иванович   |               | [test1235@test.com](mailto:test1235@test.com) | Ошибка - нет даты рождения              |
     * | Иванов Ивани Иванович   | 19.02.1989    |                                               | Ошибка - нет почты                      |
     * | Иванов Ивани Иванович   | test          | [test1236@test.com](mailto:test1236@test.com) | Ошибка - не верный формат даты рождения |
     * | Иванов Ивани Иванович   | 19.02.1989    | [test1236-test.com](mailto:test1236@test.com) | Ошибка - не верный формат email         |
     * | Иванов Ивани Иванович   | test          | [test1236-test.com](mailto:test1236@test.com) | Ошибка - двойная                        |
     * |                         | test          | [test1236-test.com](mailto:test1236@test.com) | Ошибка - тройная                        |
     * | Иванов Ивани Иванович 1 | 01.02.1989    | [1test123@test.com](mailto:1test123@test.com) | Удачно                                  |
     * | Иванов Ивани Иванович 2 | 02.02.1989    | [2test123@test.com](mailto:2test123@test.com) | Удачно                                  |
     * | Иванов Ивани Иванович 3 | 03.02.1989    | [3test123@test.com](mailto:3test123@test.com) | Удачно                                  |
     * | Иванов Ивани Иванович 4 | 04.02.1989    | [4test123@test.com](mailto:4test123@test.com) | Удачно                                  |
     * | Иванов Ивани Иванович 5 | 05.02.1989    | [5test123@test.com](mailto:5test123@test.com) | Удачно                                  |
     *
     * @authenticated
     * @response [{"row":0,"status":true},{"row":1,"status":false,"errors":["\u0422\u0430\u043a\u043e\u0435 \u0437\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f email \u0443\u0436\u0435 \u0441\u0443\u0449\u0435\u0441\u0442\u0432\u0443\u0435\u0442."]},{"row":2,"status":false,"errors":["\u041f\u043e\u043b\u0435 \u0444\u0438\u043e \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."]},{"row":3,"status":false,"errors":["\u041f\u043e\u043b\u0435 \u0434\u0430\u0442\u0430 \u0440\u043e\u0436\u0434\u0435\u043d\u0438\u044f \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."]},{"row":4,"status":false,"errors":["\u041f\u043e\u043b\u0435 email \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."]},{"row":5,"status":false,"errors":["\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f \u0434\u0430\u0442\u0430 \u0440\u043e\u0436\u0434\u0435\u043d\u0438\u044f \u043d\u0435 \u044f\u0432\u043b\u044f\u0435\u0442\u0441\u044f \u0434\u0430\u0442\u043e\u0439.","\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f \u0434\u0430\u0442\u0430 \u0440\u043e\u0436\u0434\u0435\u043d\u0438\u044f \u043d\u0435 \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0443\u0435\u0442 \u0444\u043e\u0440\u043c\u0430\u0442\u0443 \u0434\u0430\u0442\u044b d.m.Y."]},{"row":6,"status":false,"errors":["\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f email \u0434\u043e\u043b\u0436\u043d\u043e \u0431\u044b\u0442\u044c \u0434\u0435\u0439\u0441\u0442\u0432\u0438\u0442\u0435\u043b\u044c\u043d\u044b\u043c \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043d\u043d\u044b\u043c \u0430\u0434\u0440\u0435\u0441\u043e\u043c."]},{"row":7,"status":false,"errors":["\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f \u0434\u0430\u0442\u0430 \u0440\u043e\u0436\u0434\u0435\u043d\u0438\u044f \u043d\u0435 \u044f\u0432\u043b\u044f\u0435\u0442\u0441\u044f \u0434\u0430\u0442\u043e\u0439.","\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f \u0434\u0430\u0442\u0430 \u0440\u043e\u0436\u0434\u0435\u043d\u0438\u044f \u043d\u0435 \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0443\u0435\u0442 \u0444\u043e\u0440\u043c\u0430\u0442\u0443 \u0434\u0430\u0442\u044b d.m.Y."]},{"row":7,"status":false,"errors":["\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f email \u0434\u043e\u043b\u0436\u043d\u043e \u0431\u044b\u0442\u044c \u0434\u0435\u0439\u0441\u0442\u0432\u0438\u0442\u0435\u043b\u044c\u043d\u044b\u043c \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043d\u043d\u044b\u043c \u0430\u0434\u0440\u0435\u0441\u043e\u043c."]},{"row":8,"status":false,"errors":["\u041f\u043e\u043b\u0435 \u0444\u0438\u043e \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."]},{"row":8,"status":false,"errors":["\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f \u0434\u0430\u0442\u0430 \u0440\u043e\u0436\u0434\u0435\u043d\u0438\u044f \u043d\u0435 \u044f\u0432\u043b\u044f\u0435\u0442\u0441\u044f \u0434\u0430\u0442\u043e\u0439.","\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f \u0434\u0430\u0442\u0430 \u0440\u043e\u0436\u0434\u0435\u043d\u0438\u044f \u043d\u0435 \u0441\u043e\u043e\u0442\u0432\u0435\u0442\u0441\u0442\u0432\u0443\u0435\u0442 \u0444\u043e\u0440\u043c\u0430\u0442\u0443 \u0434\u0430\u0442\u044b d.m.Y."]},{"row":8,"status":false,"errors":["\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435 \u043f\u043e\u043b\u044f email \u0434\u043e\u043b\u0436\u043d\u043e \u0431\u044b\u0442\u044c \u0434\u0435\u0439\u0441\u0442\u0432\u0438\u0442\u0435\u043b\u044c\u043d\u044b\u043c \u044d\u043b\u0435\u043a\u0442\u0440\u043e\u043d\u043d\u044b\u043c \u0430\u0434\u0440\u0435\u0441\u043e\u043c."]},{"row":9,"status":true},{"row":10,"status":true},{"row":11,"status":true},{"row":12,"status":true},{"row":13,"status":true}]
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors"
     * @param ImportStudentRequest $request
     */
    public function import(ImportStudentRequest $request)
    {
        $import = new StudentImport();
        $import->import($request->import_file);
        return $this->respondCreated($import->rowResult);
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

    /**
     * Изменить статус
     *
     * @authenticated
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"\u041f\u043e\u043b\u0435 education status \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f.","errors":{"education_status":["\u041f\u043e\u043b\u0435 education status \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."]}}
     * @apiResource App\Http\Resources\Student\StudentResource
     * @apiResourceModel App\Models\Student with=teacher,group
     * @param Student $student
     * @param UpdateStudentEducationStatusRequest $request
     * @return StudentResource
     */
    public function updateEducationStatus(UpdateStudentEducationStatusRequest $request, Student $student)
    {
        $student->update(['education_status' => $request->education_status]);
        $student->load(['teacher', 'group']);
        return new StudentResource($student);
    }

    /**
     * Изменить статус множественно
     *
     * @authenticated
     * @response status=201 scenario="Updated"
     * @response status=401 scenario="Unauthorized" {"status":"error","message":"Unauthorized"}
     * @response status=429 scenario="Validation Errors" {"message":"\u041f\u043e\u043b\u0435 education status \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f. (and 1 more error)","errors":{"education_status":["\u041f\u043e\u043b\u0435 education status \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."],"students_ids":["\u041f\u043e\u043b\u0435 students ids \u043e\u0431\u044f\u0437\u0430\u0442\u0435\u043b\u044c\u043d\u043e \u0434\u043b\u044f \u0437\u0430\u043f\u043e\u043b\u043d\u0435\u043d\u0438\u044f."]}}
     * @param UpdateStudentEducationStatusMultiplyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEducationStatusMultiply(UpdateStudentEducationStatusMultiplyRequest $request)
    {

        Student::whereIn('id', $request->students_ids)
            ->update(['education_status' => $request->education_status]);


        return $this->respondUpdated();
    }
}

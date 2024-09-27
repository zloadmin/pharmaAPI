<?php

use App\Http\Controllers\Admin\Department\DepartmentController;
use App\Http\Controllers\Admin\Group\GroupController;
use App\Http\Controllers\Admin\Student\StudentController;
use App\Http\Controllers\Admin\Teacher\TeacherController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
    });
    // Auth
    Route::middleware('auth:sanctum')->group(function () {

        // Admin
        Route::prefix('admin')->middleware('role:admin')->group(function () {

            // Teachers
            Route::prefix('teacher')->group(function () {
                Route::get('/', [TeacherController::class, 'list']);
                Route::get('{teacher}', [TeacherController::class, 'show']);
                Route::post('create', [TeacherController::class, 'store']);
                Route::put('update/{teacher}', [TeacherController::class, 'update']);
                Route::delete('delete/{teacher}', [TeacherController::class, 'delete']);
            });

            // Students
            Route::prefix('student')->group(function () {
                Route::get('/', [StudentController::class, 'list']);
                Route::get('{student}', [StudentController::class, 'show']);
                Route::post('create', [StudentController::class, 'store']);
                Route::post('import', [StudentController::class, 'import']);
                Route::put('update/{student}', [StudentController::class, 'update']);
                Route::delete('delete/{student}', [StudentController::class, 'delete']);
                Route::put('update-multiply/education-status', [StudentController::class, 'updateEducationStatusMultiply']);
                Route::put('update/{student}/education-status', [StudentController::class, 'updateEducationStatus']);
            });

            // Groups
            Route::prefix('group')->group(function () {
                Route::get('/', [GroupController::class, 'list']);
                Route::get('{group}', [GroupController::class, 'show']);
                Route::post('create', [GroupController::class, 'store']);
                Route::put('update/{group}', [GroupController::class, 'update']);
                Route::delete('delete/{group}', [GroupController::class, 'delete']);
                Route::put('reassign/{group}/student/{student}', [GroupController::class, 'reassignStudent']);
                Route::put('reassign/{group}/teacher/{teacher}', [GroupController::class, 'reassignTeacher']);
            });

            // Departments
            Route::prefix('department')->group(function () {
                Route::get('/', [DepartmentController::class, 'list']);
                Route::get('{department}', [DepartmentController::class, 'show']);
                Route::post('create', [DepartmentController::class, 'store']);
                Route::put('update/{department}', [DepartmentController::class, 'update']);
                Route::delete('delete/{department}', [DepartmentController::class, 'delete']);
            });



//
//            // Tickets
//            Route::prefix('ticket')->group(function () {
//                Route::get('/', [TicketController::class, 'list']);
//                Route::get('{ticket}', [TicketController::class, 'show']);
//                Route::post('create', [TicketController::class, 'store']);
//                Route::put('update/{ticket}', [TicketController::class, 'update']);
//                Route::delete('delete/{ticket}', [TicketController::class, 'delete']);
//            });


        });
    });
});
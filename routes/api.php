<?php


use App\Http\Controllers\Admin\Department\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\Group\GroupController as AdminGroupController;
use App\Http\Controllers\Admin\Student\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\Teacher\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\Ticket\TicketController as AdminTicketController;

use App\Http\Controllers\Teacher\Department\DepartmentController as TeacherDepartmentController;
use App\Http\Controllers\Teacher\Group\GroupController as TeacherGroupController;
use App\Http\Controllers\Teacher\Student\StudentController as TeacherStudentController;
use App\Http\Controllers\Teacher\Teacher\TeacherController as TeacherTeacherController;
use App\Http\Controllers\Teacher\Ticket\TicketController as TeacherTicketController;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Profile\ProfileController;
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

        Route::prefix('profile')->group(function () {
            Route::post('profile', [ProfileController::class, 'profile']);
        });

        Route::prefix('role')->group(function () {
            // Admin
            Route::prefix('admin')->middleware('role:admin')->group(function () {

                // Teachers
                Route::prefix('teacher')->group(function () {
                    Route::get('/', [AdminTeacherController::class, 'list']);
                    Route::get('{teacher}', [AdminTeacherController::class, 'show']);
                    Route::post('create', [AdminTeacherController::class, 'store']);
                    Route::put('update/{teacher}', [AdminTeacherController::class, 'update']);
                    Route::delete('delete/{teacher}', [AdminTeacherController::class, 'delete']);
                });

                // Students
                Route::prefix('student')->group(function () {
                    Route::get('/', [AdminStudentController::class, 'list']);
                    Route::get('{student}', [AdminStudentController::class, 'show']);
                    Route::post('create', [AdminStudentController::class, 'store']);
                    Route::post('import', [AdminStudentController::class, 'import']);
                    Route::put('update/{student}', [AdminStudentController::class, 'update']);
                    Route::delete('delete/{student}', [AdminStudentController::class, 'delete']);
                    Route::put('update-multiply/education-status', [AdminStudentController::class, 'updateEducationStatusMultiply']);
                    Route::put('update/{student}/education-status', [AdminStudentController::class, 'updateEducationStatus']);
                });

                // Groups
                Route::prefix('group')->group(function () {
                    Route::get('/', [AdminGroupController::class, 'list']);
                    Route::get('{group}', [AdminGroupController::class, 'show']);
                    Route::post('create', [AdminGroupController::class, 'store']);
                    Route::put('update/{group}', [AdminGroupController::class, 'update']);
                    Route::delete('delete/{group}', [AdminGroupController::class, 'delete']);
                    Route::put('reassign/{group}/student/{student}', [AdminGroupController::class, 'reassignStudent']);
                    Route::put('reassign/{group}/teacher/{teacher}', [AdminGroupController::class, 'reassignTeacher']);
                });

                // Departments
                Route::prefix('department')->group(function () {
                    Route::get('/', [AdminDepartmentController::class, 'list']);
                    Route::get('{department}', [AdminDepartmentController::class, 'show']);
                    Route::post('create', [AdminDepartmentController::class, 'store']);
                    Route::put('update/{department}', [AdminDepartmentController::class, 'update']);
                    Route::delete('delete/{department}', [AdminDepartmentController::class, 'delete']);
                });

                // Tickets
                Route::prefix('ticket')->group(function () {
                    Route::get('/', [AdminTicketController::class, 'list']);
                    Route::get('{ticket}', [AdminTicketController::class, 'show']);
                    Route::post('create', [AdminTicketController::class, 'store']);
                    Route::put('update/{ticket}', [AdminTicketController::class, 'update']);
                    Route::put('update-videos/{ticket}', [AdminTicketController::class, 'updateVideos']);
                    Route::delete('delete/{ticket}', [AdminTicketController::class, 'delete']);
                });

            });
            // Teacher
            Route::prefix('teacher')->middleware('role:teacher')->group(function () {

                // Students
                Route::prefix('student')->group(function () {
                    Route::get('/', [TeacherStudentController::class, 'list']);
                    Route::get('{student}', [TeacherStudentController::class, 'show']);
                    Route::post('create', [TeacherStudentController::class, 'store']);
                    Route::post('import', [TeacherStudentController::class, 'import']);
                    Route::put('update/{student}', [TeacherStudentController::class, 'update']);
                    Route::delete('delete/{student}', [TeacherStudentController::class, 'delete']);
                });
                // Tickets
                Route::prefix('ticket')->group(function () {
                    Route::get('/', [TeacherTicketController::class, 'list']);
                    Route::get('{ticket}', [TeacherTicketController::class, 'show']);
                    Route::post('create', [TeacherTicketController::class, 'store']);
                    Route::put('update/{ticket}', [TeacherTicketController::class, 'update']);
                    Route::put('update-videos/{ticket}', [TeacherTicketController::class, 'updateVideos']);
                    Route::delete('delete/{ticket}', [TeacherTicketController::class, 'delete']);
                });

            });
        });

    });
});